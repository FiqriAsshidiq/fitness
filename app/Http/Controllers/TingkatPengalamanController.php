<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengalaman;

class TingkatPengalamanController extends Controller
{
    public function index()
    {
        $pengalaman = Pengalaman::all();
        return view('admin.pengalaman.index', compact('pengalaman'));
    }

    public function create()
    {
        return view('admin.pengalaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:pengalaman,kode|max:10',
            'level' => 'required|unique:pengalaman,level|max:50',
            'deskripsi' => 'required|string|max:255',
        ]);

        Pengalaman::create([
            'kode' => $request->kode,
            'level' => $request->level,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.pengalaman')->with('success', 'Tingkat pengalaman berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengalaman = Pengalaman::findOrFail($id);
        return view('admin.pengalaman.edit', compact('pengalaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|unique:pengalaman,kode,' . $id . '|max:10',
            'level' => 'required|unique:pengalaman,level,' . $id . '|max:50',
            'deskripsi' => 'required|string|max:255',
        ]);

        $pengalaman = Pengalaman::findOrFail($id);
        $pengalaman->update([
            'kode' => $request->kode,
            'level' => $request->level,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.pengalaman')->with('success', 'Tingkat pengalaman berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengalaman = Pengalaman::findOrFail($id);
        $pengalaman->delete();

        return redirect()->route('admin.pengalaman')->with('success', 'Tingkat pengalaman berhasil dihapus');
    }
}
