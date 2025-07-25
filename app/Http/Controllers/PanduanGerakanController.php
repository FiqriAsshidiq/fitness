<?php

namespace App\Http\Controllers;

use App\Models\PanduanGerakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PanduanGerakanController extends Controller
{
    public function index()
    {
        $gerakan = PanduanGerakan::all();
        return view('admin.panduan.gerakan.index', compact('gerakan'));
    }

public function showToMember(Request $request)
{
    // Ambil semua kategori unik dari target otot
    $kategori = PanduanGerakan::pluck('target_otot')->unique();

    // Bangun query
    $query = PanduanGerakan::query();

    // Filter berdasarkan nama gerakan
    if ($request->filled('search')) {
        $query->where('nama_gerakan', 'like', '%' . $request->search . '%');
    }

    // Filter berdasarkan kategori otot
    if ($request->filled('kategori')) {
        $query->where('target_otot', $request->kategori);
    }

    // Ambil hasil
    $gerakan = $query->orderBy('target_otot')->get();

    return view('member.gerakan.index', compact('gerakan', 'kategori'));
    }

    public function create()
    {
        return view('admin.panduan.gerakan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gerakan' => 'required|string|max:255',
            'target_otot' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gif_url' => 'nullable|mimes:gif|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('gif_url')) {
            $filePath = $request->file('gif_url')->store('gerakan', 'public');
        }

        PanduanGerakan::create([
            'nama_gerakan' => $request->nama_gerakan,
            'target_otot' => $request->target_otot,
            'deskripsi' => $request->deskripsi,
            'gif_url' => $filePath,
        ]);

        return redirect()->route('admin.gerakan')->with('success', 'Gerakan berhasil ditambahkan.');
    }

    public function edit(PanduanGerakan $panduan_gerakan)
    {
        return view('admin.panduan.gerakan.edit', compact('panduan_gerakan'));
    }

    public function update(Request $request, PanduanGerakan $panduan_gerakan)
    {
        $request->validate([
            'nama_gerakan' => 'required|string|max:255',
            'target_otot' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gif_url' => 'nullable|mimes:gif|max:2048',
        ]);

        if ($request->hasFile('gif_url')) {
            if ($panduan_gerakan->gif_url) {
                Storage::disk('public')->delete($panduan_gerakan->gif_url);
            }
            $panduan_gerakan->gif_url = $request->file('gif_url')->store('gerakan', 'public');
        }

        $panduan_gerakan->update([
            'nama_gerakan' => $request->nama_gerakan,
            'target_otot' => $request->target_otot,
            'deskripsi' => $request->deskripsi,
            'gif_url' => $panduan_gerakan->gif_url,
        ]);

        return redirect()->route('admin.gerakan')->with('success', 'Gerakan berhasil diperbarui.');
    }

    public function destroy(PanduanGerakan $panduan_gerakan)
    {
        if ($panduan_gerakan->gif_url) {
            Storage::disk('public')->delete($panduan_gerakan->gif_url);
        }

        $panduan_gerakan->delete();

        return redirect()->route('admin.gerakan')->with('success', 'Gerakan berhasil dihapus.');
    }
}
