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
            'jenis_kelamin' => 'required|in:pria,wanita',
            'berat_badan' => 'required|numeric|min:30',
            'tinggi_badan' => 'required|numeric|min:100',
            'usia' => 'required|integer|min:10',
            'target_otot' => 'required|array|min:1',
            'aktivitas_fisik_id' => 'required|exists:aktivitas_fisik,id',            
            'pengalaman_id' => 'required|exists:pengalaman,id',
            'tujuan_latihan_id' => 'required|exists:tujuan_latihan,id',
        ]);

        $user = Auth::user();

        // Hitung BMR
        $bb = $request->berat_badan;
        $tb = $request->tinggi_badan;
        $usia = $request->usia;
        $gender = $request->jenis_kelamin;

        $bmr = ($gender === 'pria')
            ? 10 * $bb + 6.25 * $tb - 5 * $usia + 5
            : 10 * $bb + 6.25 * $tb - 5 * $usia - 161;

        // Ambil faktor aktivitas
        $aktivitas = AktivitasFisik::find($request->aktivitas_fisik_id);
        if (!$aktivitas) {
            return back()->withErrors(['aktivitas_fisik_id' => 'Aktivitas fisik tidak ditemukan.']);
        }

        $tdee = $bmr * $aktivitas->faktor_tdee;

        // Simpan konsultasi
        $konsultasi = Konsultasi::create([
            'user_id' => $user->id,
            'jenis_kelamin' => $gender,
            'berat_badan' => $bb,
            'tinggi_badan' => $tb,
            'usia' => $usia,
            'aktivitas_fisik_id' => $request->aktivitas_fisik_id,
            'pengalaman_id' => $request->pengalaman_id,
            'tujuan_latihan_id' => $request->tujuan_latihan_id,

        ]);

        $konsultasi->targetOtot()->attach($request->target_otot);

        // Cari rule yang cocok
        $selected = $request->target_otot;
        sort($selected);

        $rules = Rule::with('targetOtot', 'rekomendasi')
            ->where('pengalaman_id', $request->pengalaman_id)
            ->where('tujuan_latihan_id', $request->tujuan_latihan_id)
            ->get();

        foreach ($rules as $rule) {
            $ruleTargetIds = $rule->targetOtot->pluck('id')->toArray();
            sort($ruleTargetIds);

            if ($ruleTargetIds === $selected) {
                $konsultasi->update([
                    'rekomendasi_id' => $rule->rekomendasi->id ?? null
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
            'targetOtot',
            'rekomendasi.latihan',
            'rekomendasi.tujuanLatihan',
            'pengalaman',
            'aktivitasFisik'
        ])->findOrFail($id);

        $bmr = session('bmr');
        $tdee = session('tdee');

        return view('konsultasi.hasil', compact('konsultasi', 'bmr', 'tdee'));
    }
}
