<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Latihan;

class LatihanController extends Controller
{
    public function index()
    {
        $latihan = Latihan::all();
        return view('latihan.index', compact('latihan'));
    }

    public function create()
    {
        return view('latihan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:latihan,kode',
            'nama_teknik' => 'required|string|max:255',
        ]);

        Latihan::create($request->only('kode', 'nama_teknik'));

        return redirect()->route('latihan.index')->with('success', 'Teknik latihan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $latihan = Latihan::findOrFail($id);
        return view('latihan.edit', compact('latihan'));
    }

    public function update(Request $request, $id)
    {
        $latihan = Latihan::findOrFail($id);

        $request->validate([
            'kode' => 'required|unique:latihan,kode,' . $id,
            'nama_teknik' => 'required|string|max:255',
        ]);

        $latihan->update($request->only('kode', 'nama_teknik'));

        return redirect()->route('latihan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $latihan = Latihan::findOrFail($id);
        $latihan->delete();

        return redirect()->route('latihan.index')->with('success', 'Data berhasil dihapus.');
    }
}
