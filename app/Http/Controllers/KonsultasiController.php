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
use App\Models\KondisiTubuh;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function index()
    {
        $targetOtot = TargetOtot::all();
        $pengalaman = Pengalaman::all();
        $aktivitas = AktivitasFisik::all();
        $tujuanLatihan = TujuanLatihan::all();
        $kondisiTubuh = KondisiTubuh::all();

        return view('member.konsultasi.index', compact('targetOtot', 'pengalaman', 'aktivitas', 'tujuanLatihan', 'kondisiTubuh'));
    }

public function proses(Request $request)
{
    $request->validate([
        'target_otot'          => 'required|array|min:1',
        'aktivitas_fisik_id'   => 'required|exists:aktivitas_fisik,id',
        'pengalaman_id'        => 'required|exists:pengalaman,id',
        'tujuan_latihan_id'    => 'required|exists:tujuan_latihan,id',
        'kondisi_tubuh_id'     => 'required|exists:kondisi_tubuh,id',
    ]);

    $user = Auth::user();

    // Ambil data dari user yang login
    $bb = $user->berat_badan;
    $tb = $user->tinggi_badan;
    $usia = $user->usia;
    $gender = $user->jenis_kelamin;

    // Hitung BMR
    $bmr = ($gender === 'pria')
        ? (10 * $bb + 6.25 * $tb - 5 * $usia + 5)
        : (10 * $bb + 6.25 * $tb - 5 * $usia - 161);

    // Hitung TDEE
    $aktivitas = AktivitasFisik::find($request->aktivitas_fisik_id);
    $tdee = $bmr * $aktivitas->nilai;

    // Hitung kalori & protein
    $tujuan = TujuanLatihan::find($request->tujuan_latihan_id)->nama;
    $tujuanLower = strtolower($tujuan);

    switch ($tujuanLower) {
        case 'fat loss':
        case 'cutting':
            $kalori = $tdee - 200;
            $protein = $bb * 2.2;
            break;
        case 'bulking':
            $kalori = $tdee + 200;
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
        'aktivitas_fisik_id' => $request->aktivitas_fisik_id,
        'pengalaman_id'      => $request->pengalaman_id,
        'tujuan_latihan_id'  => $request->tujuan_latihan_id,
        'kondisi_tubuh_id'   => $request->kondisi_tubuh_id,
        'bmr'                => $bmr,
        'tdee'               => $tdee,
        'kalori'             => round($kalori),
        'protein'            => round($protein),
    ]);

    $konsultasi->targetOtot()->attach($request->target_otot);

    // Proses rule
    $selected = collect($request->target_otot)->map(fn($id) => (int) $id)->sort()->values()->all();

    $rules = Rule::with('targetOtot', 'rekomendasi')
        ->where('pengalaman_id', $request->pengalaman_id)
        ->where('tujuan_latihan_id', $request->tujuan_latihan_id)
        ->where('kondisi_tubuh_id', $request->kondisi_tubuh_id)
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

    return redirect()->route('member.konsultasi.hasil', $konsultasi->id)
                     ->with(['bmr' => $bmr, 'tdee' => $tdee]);
}

    public function hasil($id)
    {
        $konsultasi = Konsultasi::with([
            'rekomendasi.latihan',
            'tujuanLatihan',
            'pengalaman',
            'aktivitasFisik',
            'targetOtot',
            'kondisiTubuh'
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

        return view('member.konsultasi.hasil', compact('konsultasi', 'jadwal'));
    }
}
