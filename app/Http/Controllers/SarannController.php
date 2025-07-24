<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\saran;
use Illuminate\Support\Facades\Auth;

class SaranController extends Controller
{
    public function index()
    {
        $data = saran::with('user')->latest()->get();
        return view('admin.saran.index', compact('data'));
    }

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
