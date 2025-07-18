<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Konsultasi;
use App\Models\Latihan;

class HasilRekomendasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $konsultasi = Konsultasi::with([
            'targetOtot',
            'rekomendasi.latihan',
            'rekomendasi.rule',
            'pengalaman',
            'aktivitasFisik',
            'tujuanLatihan'
        ])
        ->where('user_id', $user->id)
        ->latest()
        ->first();

        $jadwal = [];

        if ($konsultasi && $konsultasi->targetOtot->isNotEmpty()) {
            $fokusOtot = strtolower($konsultasi->targetOtot->first()->fokus); // upper body / lower body / full body

            // Ambil semua latihan dari hasil rekomendasi
            $rekomendasi = $konsultasi->rekomendasi;

            $latihan = collect();

            if ($rekomendasi instanceof \Illuminate\Database\Eloquent\Collection) {
                foreach ($rekomendasi as $rekom) {
                    $latihan = $latihan->merge($rekom->latihan);
                }
            } else {
                $latihan = $rekomendasi->latihan ?? collect();
            }

            // Filter latihan berdasarkan kategori otot & bagi ke hari
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

            // Debug sementara (bisa hapus nanti)
            // dd([
            //     'Fokus' => $fokusOtot,
            //     'Latihan ditemukan' => $latihan->pluck('kategori_otot', 'nama_teknik'),
            //     'Jadwal' => $jadwal
            // ]);
        }

        return view('konsultasi.hasil', compact('konsultasi', 'jadwal'));
    }
}
