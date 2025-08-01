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
            'kondisi' => [
                'required',
                'string',
                'regex:/^[a-zA-Z\s]+$/', 
                'max:255',
                'unique:kondisi_tubuh,kondisi', 
            ],
        ], [
            'kondisi.regex' => 'Kondisi hanya boleh berisi huruf dan spasi, contoh "Sehat" atau "Cedera Ringan".',
            'kondisi.unique' => 'Kondisi ini sudah ada, silakan gunakan nama lain.',
        ]);

        KondisiTubuh::create(['kondisi' => $request->kondisi,]);

        return redirect()->route('admin.kondisi_tubuh')->with('success', 'Kondisi tubuh berhasil ditambahkan.');
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
    $kondisi = KondisiTubuh::findOrFail($id);

    $request->validate([
        'kondisi' => [
            'required',
            'string',
            'regex:/^[a-zA-Z\s]+$/',
            'max:255',
            'unique:kondisi_tubuh,kondisi,' . $kondisi->id, 
        ],
    ], [
        'kondisi.regex' => 'Kondisi hanya boleh berisi huruf dan spasi.',
        'kondisi.unique' => 'Kondisi ini sudah ada.',
    ]);

    $kondisi->update([
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
