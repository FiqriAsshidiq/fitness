<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saran;
use Illuminate\Support\Facades\Auth;

class SaranController extends Controller
{
    // Tampilkan semua saran (admin)
    public function index()
    {
        // Tambahkan pengecekan role jika ada
    if (Auth::user()->role_id != 1) {
        abort(403);
    }

        $data = Saran::with('user')->latest()->get();
        return view('admin.saran.index', compact('data'));
    }

    // Form buat user input saran
    public function create()
    {
        return view('member.saran.create');
    }

    // Simpan saran dari user
    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string',
        ]);

        Saran::create([
            'user_id' => Auth::id(),
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('success', 'Saran berhasil dikirim.');
    }
}
