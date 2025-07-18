<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\TargetOtot;
use App\Models\Rule;
use App\Models\Pengalaman;
use App\Models\TujuanLatihan;
use App\Models\AktivitasFisik;
use App\Models\Latihan;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function index()
    {
        $targetOtot = TargetOtot::all();
        $pengalaman = Pengalaman::all();
        $aktivitas = AktivitasFisik::all();
        $tujuanLatihan = TujuanLatihan::all();

        return view('konsultasi.index', compact('targetOtot', 'pengalaman', 'aktivitas', 'tujuanLatihan'));
    }

    public function proses(Request $request)
    {
        $request->validate([
            'jenis_kelamin'        => 'required|in:pria,wanita',
            'berat_badan'          => 'required|numeric|min:30',
            'tinggi_badan'         => 'required|numeric|min:100',
            'usia'                 => 'required|integer|min:10',
            'target_otot'          => 'required|array|min:1',
            'aktivitas_fisik_id'   => 'required|exists:aktivitas_fisik,id',
            'pengalaman_id'        => 'required|exists:pengalaman,id',
            'tujuan_latihan_id'    => 'required|exists:tujuan_latihan,id',
        ]);

        $user = Auth::user();

        $bb = $request->berat_badan;
        $tb = $request->tinggi_badan;
        $usia = $request->usia;
        $gender = $request->jenis_kelamin;

        // Hitung BMR
        $bmr = ($gender === 'pria')
            ? (10 * $bb + 6.25 * $tb - 5 * $usia + 5)
            : (10 * $bb + 6.25 * $tb - 5 * $usia - 161);

        // Hitung TDEE
        $aktivitas = AktivitasFisik::find($request->aktivitas_fisik_id);
        $tdee = $bmr * $aktivitas->nilai;

        // Hitung kalori & protein berdasarkan tujuan
        $tujuan = TujuanLatihan::find($request->tujuan_latihan_id)->nama;
        $tujuanLower = strtolower($tujuan);

        switch ($tujuanLower) {
            case 'fat loss':
            case 'cutting':
                $kalori = $tdee - 500;
                $protein = $bb * 2.2;
                break;

            case 'bulking':
                $kalori = $tdee + 300;
                $protein = $bb * 2.0;
                break;

            case 'maintenance':
            default:
                $kalori = $tdee;
                $protein = $bb * 1.8;
                break;
        }

        // Simpan konsultasi
        $konsultasi = Konsultasi::create([
            'user_id'            => $user->id,
            'jenis_kelamin'      => $gender,
            'berat_badan'        => $bb,
            'tinggi_badan'       => $tb,
            'usia'               => $usia,
            'aktivitas_fisik_id' => $request->aktivitas_fisik_id,
            'pengalaman_id'      => $request->pengalaman_id,
            'tujuan_latihan_id'  => $request->tujuan_latihan_id,
            'bmr'                => $bmr,
            'tdee'               => $tdee,
            'kalori'             => round($kalori),
            'protein'            => round($protein),
        ]);

        $konsultasi->targetOtot()->attach($request->target_otot);

        $selected = collect($request->target_otot)->map(fn($id) => (int) $id)->sort()->values()->all();

        $rules = Rule::with('targetOtot', 'rekomendasi')
            ->where('pengalaman_id', $request->pengalaman_id)
            ->where('tujuan_latihan_id', $request->tujuan_latihan_id)
            ->get();

        foreach ($rules as $rule) {
            $ruleTargetIds = $rule->targetOtot->pluck('id')->sort()->values()->all();

            if ($selected === $ruleTargetIds) {
                $konsultasi->update([
                    'rekomendasi_id' => $rule->rekomendasi->id ?? null,
                ]);
                break;
            }
        }

        return redirect()->route('konsultasi.hasil', $konsultasi->id)
                         ->with(['bmr' => $bmr, 'tdee' => $tdee]);
    }

    public function hasil($id)
    {
        $konsultasi = Konsultasi::with([
            'rekomendasi.latihan',
            'tujuanLatihan',
            'pengalaman',
            'aktivitasFisik',
            'targetOtot'
        ])->findOrFail($id);

        $rekomendasi = $konsultasi->rekomendasi;
        $jadwal = [];

        if ($rekomendasi && $konsultasi->targetOtot->isNotEmpty()) {
            $fokusOtot = strtolower($konsultasi->targetOtot->first()->fokus);

            $latihan = $rekomendasi->latihan ?? collect();

            switch ($fokusOtot) {
                case 'upper body':
                    $jadwal = [
                        'Senin' => $latihan->where('kategori_otot', 'dada'),
                        'Rabu'  => $latihan->where('kategori_otot', 'punggung'),
                        'Jumat' => $latihan->where('kategori_otot', 'bahu'),
                    ];
                    break;

                case 'lower body':
                    $jadwal = [
                        'Senin' => $latihan->where('kategori_otot', 'perut'),
                        'Rabu'  => $latihan->where('kategori_otot', 'paha'),
                        'Jumat' => $latihan->where('kategori_otot', 'kaki'),
                    ];
                    break;

                case 'full body':
                    $jadwal = [
                        'Senin' => $latihan->whereIn('kategori_otot', ['dada', 'bahu', 'tricep']),
                        'Rabu'  => $latihan->whereIn('kategori_otot', ['punggung', 'bicep']),
                        'Jumat' => $latihan->whereIn('kategori_otot', ['paha', 'kaki', 'perut']),
                    ];
                    break;
            }
        }

        return view('konsultasi.hasil', compact('konsultasi', 'jadwal'));
    }
}
