<?php

namespace App\Http\Controllers;

use App\Models\Rekomendasi;
use App\Models\Rule;
use App\Models\Latihan;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    public function index()
    {
        $rekomendasi = Rekomendasi::with(['rule', 'latihan'])->get();
        return view('rekomendasi.index', compact('rekomendasi'));
    }

    public function create()
    {
        $rules = Rule::all();
        $latihan = Latihan::all();
        return view('rekomendasi.create', compact('rules', 'latihan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rule_id' => 'required|exists:rules,id',
            'kode' => 'required|unique:rekomendasi,kode',
            'metode_latihan' => 'nullable',
            'keterangan' => 'nullable',
            'latihan_id' => 'array'
        ]);

        $rekomendasi = Rekomendasi::create([
            'rule_id' => $request->rule_id,
            'kode' => $request->kode,
            'metode_latihan' => $request->metode_latihan,
            'keterangan' => $request->keterangan,
        ]);

        if ($request->has('latihan_id')) {
            $rekomendasi->latihan()->attach($request->latihan_id);
        }

        return redirect()->route('rekomendasi')->with('success', 'Rekomendasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rekomendasi = Rekomendasi::with('latihan')->findOrFail($id);
        $rules = Rule::all();
        $latihan = Latihan::all();
        return view('rekomendasi.edit', compact('rekomendasi', 'rules', 'latihan'));
    }

    public function update(Request $request, $id)
    {
        $rekomendasi = Rekomendasi::findOrFail($id);

        $request->validate([
            'rule_id' => 'required|exists:rules,id',
            'kode' => 'required|unique:rekomendasi,kode,' . $id,
            'metode_latihan' => 'nullable',
            'keterangan' => 'nullable',
            'latihan_id' => 'array'
        ]);

        $rekomendasi->update([
            'rule_id' => $request->rule_id,
            'kode' => $request->kode,
            'metode_latihan' => $request->metode_latihan,
            'keterangan' => $request->keterangan,
        ]);

        $rekomendasi->latihan()->sync($request->latihan_id ?? []);

        return redirect()->route('rekomendasi')->with('success', 'Rekomendasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rekomendasi = Rekomendasi::findOrFail($id);
        $rekomendasi->delete();

        return redirect()->route('rekomendasi')->with('success', 'Rekomendasi berhasil dihapus.');
    }
}
