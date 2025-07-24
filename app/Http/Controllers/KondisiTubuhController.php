<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KondisiTubuh;


class KondisiTubuhController extends Controller
{
    // Tampilkan semua data kondisi tubuh
    public function index()
    {
        $kondisi = KondisiTubuh::all();
        return view('admin.kondisi_tubuh.index', compact('kondisi'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.kondisi_tubuh.create');
    }

    // Simpan data baru ke database
    public function store(Request $request)
    
    {
        $request->validate([
            'kode' => 'required|unique:kondisi_tubuh,kode',            
            'kondisi' => 'required|string|max:255',
        ]);

        KondisiTubuh::create([
            'kode' => $request->kode,
            'kondisi' => $request->kondisi,
        ]);

        return redirect()->route('admin.kondisi_tubuh')->with('success', 'Kondisi tubuh berhasil ditambahkan.');
    }

    // Tampilkan detail data
    public function show(string $id)
    {
        $kondisi = KondisiTubuh::findOrFail($id);
        return view('kondisi_tubuh.show', compact('kondisi'));
    }

    // Tampilkan form edit
    public function edit(string $id)
    {
        $kondisi = KondisiTubuh::findOrFail($id);
        return view('admin.kondisi_tubuh.edit', compact('kondisi'));
    }

    // Simpan update data
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'kondisi' => 'required|string|max:255',
        ]);

        $kondisi = KondisiTubuh::findOrFail($id);
        $kondisi->update([
            'kode' => $request->kode,
            'kondisi' => $request->kondisi,
        ]);

        return redirect()->route('admin.kondisi_tubuh')->with('success', 'Kondisi tubuh berhasil diupdate.');
    }

    // Hapus data
    public function destroy(string $id)
    {
        $kondisi = KondisiTubuh::findOrFail($id);
        $kondisi->delete();

        return redirect()->route('admin.kondisi_tubuh')->with('success', 'Kondisi tubuh berhasil dihapus.');
    }
}
