<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TujuanLatihan;

class TujuannController extends Controller
{
    public function index()
    {
        $tujuan = TujuanLatihan::all();
        return view('admin.tujuan.index', compact('tujuan'));
    }

    public function create()
    {
        return view('admin.tujuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:tujuan_latihan,kode|max:10',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        TujuanLatihan::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.tujuan')->with('success', 'Tujuan berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $tujuan = TujuanLatihan::findOrFail($id);
        return view('admin.tujuan.edit', compact('tujuan'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode' => 'required|unique:tujuan_latihan,kode,' . $id . '|max:10',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $tujuan = TujuanLatihan::findOrFail($id);
        $tujuan->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.tujuan')->with('success', 'Tujuan berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $tujuan = TujuanLatihan::findOrFail($id);
        $tujuan->delete();

        return redirect()->route('admin.tujuan')->with('success', 'Tujuan berhasil dihapus');
    }
}
