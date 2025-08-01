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
            'level' => [
                'required',
                'string',
                'regex:/^[a-zA-Z\s]+$/',
                'max:255',
                'unique:tingkat_pengalaman,level',
            ],
            'deskripsi' => [
                'required',
                'string',
                'max:1000',
            ],
        ], [
            'level.required' => 'Level harus diisi.',
            'level.regex' => 'Level hanya boleh berisi huruf dan spasi.',
            'level.unique' => 'Level ini sudah ada.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
        ]);

        TingkatPengalaman::create($request->all());

        return redirect()->route('admin.pengalaman.index')
            ->with('success', 'Data pengalaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengalaman = Pengalaman::findOrFail($id);
        return view('admin.pengalaman.edit', compact('pengalaman'));
    }

    public function update(Request $request, TingkatPengalaman $pengalaman)
    {
        $request->validate([
            'level' => [
                'required',
                'string',
                'regex:/^[a-zA-Z\s]+$/',
                'max:255',
                'unique:tingkat_pengalaman,level,' . $pengalaman->id,
            ],
            'deskripsi' => [
                'required',
                'string',
                'max:1000',
            ],
        ], [
            'level.required' => 'Level harus diisi.',
            'level.regex' => 'Level hanya boleh berisi huruf dan spasi.',
            'level.unique' => 'Level ini sudah ada.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
        ]);

        $pengalaman->update($request->all());

        return redirect()->route('admin.pengalaman.index')->with('success', 'Data pengalaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengalaman = Pengalaman::findOrFail($id);
        $pengalaman->delete();

        return redirect()->route('admin.pengalaman')->with('success', 'Tingkat pengalaman berhasil dihapus');
    }
}
