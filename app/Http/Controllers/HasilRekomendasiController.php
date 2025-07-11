<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Konsultasi;

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

        return view('konsultasi.hasil', compact('konsultasi'));
    }
}
