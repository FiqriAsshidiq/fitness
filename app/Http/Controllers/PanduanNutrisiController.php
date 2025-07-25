<?php

namespace App\Http\Controllers;

use App\Models\PanduanNutrisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PanduanNutrisiController extends Controller
{
    public function index()
    {
        $nutrisi = PanduanNutrisi::all();
        return view('admin.panduan.nutrisi.index', compact('nutrisi'));
    }

    public function showToMember(Request $request)
    {
        $query = PanduanNutrisi::query();

        // Pencarian nama makanan
        if ($request->filled('search')) {
            $query->where('nama_makanan', 'like', '%' . $request->search . '%');
        }

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $nutrisi = $query->get();
        $daftarKategori = PanduanNutrisi::select('kategori')->distinct()->pluck('kategori');

        return view('member.nutrisi.index', compact('nutrisi', 'daftarKategori'));
    }

    public function create()
    {
        return view('admin.panduan.nutrisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'energi' => 'required|numeric|min:0',
            'protein' => 'required|numeric|min:0',
            'lemak' => 'required|numeric|min:0',
            'serat' => 'nullable|numeric|min:0',
            'gambar_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('gambar_url')) {
            $filePath = $request->file('gambar_url')->store('nutrisi', 'public');
        }

        PanduanNutrisi::create([
            'nama_makanan' => $request->nama_makanan,
            'kategori' => $request->kategori,
            'energi' => $request->energi,
            'protein' => $request->protein,
            'lemak' => $request->lemak,
            'serat' => $request->serat,
            'gambar_url' => $filePath,
        ]);

        return redirect()->route('admin.nutrisi')->with('success', 'Nutrisi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $panduan_nutrisi = PanduanNutrisi::findOrFail($id);
        return view('admin.panduan.nutrisi.edit', compact('panduan_nutrisi'));
    }

    public function update(Request $request, $id)
    {
        $panduan_nutrisi = PanduanNutrisi::findOrFail($id);

        $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'energi' => 'required|numeric|min:0',
            'protein' => 'required|numeric|min:0',
            'lemak' => 'required|numeric|min:0',
            'serat' => 'nullable|numeric|min:0',
            'gambar_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar_url')) {
            if ($panduan_nutrisi->gambar_url) {
                Storage::disk('public')->delete($panduan_nutrisi->gambar_url);
            }
            $panduan_nutrisi->gambar_url = $request->file('gambar_url')->store('nutrisi', 'public');
        }

        $panduan_nutrisi->update([
            'nama_makanan' => $request->nama_makanan,
            'kategori' => $request->kategori,
            'energi' => $request->energi,
            'protein' => $request->protein,
            'lemak' => $request->lemak,
            'serat' => $request->serat,
            'gambar_url' => $panduan_nutrisi->gambar_url,
        ]);

        return redirect()->route('admin.nutrisi')->with('success', 'Nutrisi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $panduan_nutrisi = PanduanNutrisi::findOrFail($id);

        if ($panduan_nutrisi->gambar_url) {
            Storage::disk('public')->delete($panduan_nutrisi->gambar_url);
        }

        $panduan_nutrisi->delete();

        return redirect()->route('admin.nutrisi')->with('success', 'Nutrisi berhasil dihapus.');
    }
}
