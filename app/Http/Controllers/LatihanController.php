<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Latihan;

class LatihanController extends Controller
{
    public function index()
    {
        $latihan = Latihan::all();
        return view('admin.latihan.index', compact('latihan'));
    }

    public function create()
    {
        return view('admin.latihan.create');
    }

    public function store(Request $request)
        {
            // Validasi input
            $request->validate([
                'nama_teknik' => [
                    'required',
                    'string',
                    'regex:/^[a-zA-Z\s]+$/',
                    'max:255',
                    'unique:latihan,nama_teknik',
                ],
                'alat' => [
                    'required',
                    'string',
                    'max:1000',
                ],
                'kategori_otot' => [
                    'required',
                    'string',
                    'max:1000',
                ],
            ], [
                'nama_teknik.required' => 'Nama teknik harus diisi.',
                'nama_teknik.regex' => 'Nama teknik hanya boleh berisi huruf dan spasi.',
                'nama_teknik.unique' => 'Nama teknik ini sudah ada.',
                'alat.required' => 'Alat harus diisi.',
                'kategori_otot.required' => 'Kategori otot harus diisi.',
            ]);

            // Simpan ke database
            Latihan::create($request->only('nama_teknik', 'alat', 'kategori_otot'));

            // Redirect kembali dengan pesan sukses
            return redirect()->route('admin.latihan')->with('success', 'Teknik latihan berhasil ditambahkan.');
        }

    // 

    

    // 
    public function edit($id)
    {
        $latihan = Latihan::findOrFail($id);
        return view('admin.latihan.edit', compact('latihan'));
    }

    public function update(Request $request, $id)
    {
        $latihan = Latihan::findOrFail($id);

        $request->validate([
            'nama_teknik' => [
                'required',
                'string',
                'regex:/^[a-zA-Z\s]+$/',
                'max:255',
                'unique:latihan,nama_teknik,' . $latihan->id,
            ],
            'alat' => [
                'required',
                'string',
                'max:1000',
            ],
            'kategori_otot' => [
                'required',
                'string',
                'max:1000',
            ],
        ], [
            'nama_teknik.required' => 'Nama teknik harus diisi.',
            'nama_teknik.regex' => 'Nama teknik hanya boleh berisi huruf dan spasi.',
            'nama_teknik.unique' => 'Nama teknik ini sudah ada.',
            'alat.required' => 'Alat harus diisi.',
            'kategori_otot.required' => 'Kategori otot harus diisi.',
        ]);

        $latihan->update($request->only('nama_teknik', 'alat', 'kategori_otot'));

        return redirect()->route('admin.latihan')->with('success', 'Teknik latihan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $latihan = Latihan::findOrFail($id);
        $latihan->delete();

        return redirect()->route('admin.latihan')->with('success', 'Data berhasil dihapus.');
    }
}