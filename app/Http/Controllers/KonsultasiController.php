<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\TargetOtot;
use App\Models\Rule;
use App\Models\Pengalaman;
use App\Models\TujuanLatihan;
use App\Models\AktivitasFisik;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    // Tampilkan form konsultasi
    public function index()
    {
        $targetOtot = TargetOtot::all();
        $pengalaman = Pengalaman::all();
        $aktivitas = AktivitasFisik::all();
        $tujuanLatihan = TujuanLatihan::all();

        return view('konsultasi.index', compact('targetOtot', 'pengalaman', 'aktivitas', 'tujuanLatihan'));
    }

    // Proses konsultasi dan rekomendasi
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

        // Hitung BMR
        $bb = $request->berat_badan;
        $tb = $request->tinggi_badan;
        $usia = $request->usia;
        $gender = $request->jenis_kelamin;

        $bmr = ($gender === 'pria')
            ? (10 * $bb + 6.25 * $tb - 5 * $usia + 5)
            : (10 * $bb + 6.25 * $tb - 5 * $usia - 161);

        // Hitung TDEE
        $aktivitas = AktivitasFisik::find($request->aktivitas_fisik_id);
        $tdee = $bmr * $aktivitas->nilai;

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
            'bmr' => $bmr,
            'tdee' => $tdee,
        ]);

        // Simpan target otot (pivot)
        $konsultasi->targetOtot()->attach($request->target_otot);

        // Ambil data target otot terpilih (diurutkan)
        $selected = collect($request->target_otot)->map(fn($id) => (int) $id)->sort()->values()->all();

        // Ambil semua rule yang cocok dengan pengalaman dan tujuan
        $rules = Rule::with('targetOtot', 'rekomendasi')
            ->where('pengalaman_id', $request->pengalaman_id)
            ->where('tujuan_latihan_id', $request->tujuan_latihan_id)
            ->get();

        // Cek kecocokan rule
        foreach ($rules as $rule) {
            $ruleTargetIds = $rule->targetOtot->pluck('id')->sort()->values()->all();

            if ($selected === $ruleTargetIds) {
                $konsultasi->update([
                    'rekomendasi_id' => $rule->rekomendasi->id ?? null,
                ]);
                break;
            }
        }

        // Redirect ke hasil
        return redirect()->route('konsultasi.hasil', $konsultasi->id)
                         ->with(['bmr' => $bmr, 'tdee' => $tdee]);
    }

    // Tampilkan hasil konsultasi
    public function hasil($id)
    {
        $konsultasi = Konsultasi::with([
            'targetOtot',
            'rekomendasi.latihan',
            'pengalaman',
            'aktivitasFisik'
        ])->findOrFail($id);

        return view('konsultasi.hasil', compact('konsultasi'));
    }
}
