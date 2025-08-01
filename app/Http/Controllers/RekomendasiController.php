<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekomendasi;
use App\Models\Rule;
use App\Models\Latihan;


class RekomendasiController extends Controller
{
    public function index()
    {
        $rekomendasi = Rekomendasi::with('rule')->get();
        return view('admin.rekomendasi.index', compact('rekomendasi'));
    }

    public function create()
    {
        $rules = Rule::all();
        $latihan = Latihan::all();
        return view('admin.rekomendasi.create', compact('rules', 'latihan'));

    }

public function store(Request $request)
{
    $request->validate([
        'rule_id' => 'required|exists:rules,id',
        'metode_latihan' => 'required|string|max:255',
        'nutrisi' => 'required|string',
        'catatan' => 'required|string',
        'latihan_id' => 'array'
    ]);

    $rekomendasi = Rekomendasi::create([
        'rule_id' => $request->rule_id,
        'metode_latihan' => $request->metode_latihan,
        'nutrisi' => $request->nutrisi,
        'catatan' => $request->catatan,
    ]);

    if ($request->has('latihan_id')) {
        $rekomendasi->latihan()->attach($request->latihan_id);
    }

    return redirect()->route('admin.rekomendasi')->with('success', 'Data rekomendasi berhasil ditambahkan.');
}

    public function edit($id)
    {
        $rekomendasi = Rekomendasi::with('latihan')->findOrFail($id);
        $rules = Rule::all();
        $latihan = Latihan::all();
        return view('admin.rekomendasi.edit', compact('rekomendasi', 'rules', 'latihan'));
    }

public function update(Request $request, $id)
{
    $rekomendasi = Rekomendasi::findOrFail($id);

    $request->validate([
        'rule_id' => 'required|exists:rules,id',
        'metode_latihan' => 'nullable|string',
        'nutrisi' => 'nullable|string',
        'catatan' => 'nullable|string',
        'latihan_id' => 'array'
    ]);

    $rekomendasi->update([
        'rule_id' => $request->rule_id,
        'metode_latihan' => $request->metode_latihan,
        'nutrisi' => $request->nutrisi,
        'catatan' => $request->catatan,
    ]);

    $rekomendasi->latihan()->sync($request->latihan_id ?? []);

    return redirect()->route('admin.rekomendasi')->with('success', 'Rekomendasi berhasil diperbarui.');
}

    public function destroy($id)
    {
        $rekomendasi = Rekomendasi::findOrFail($id);
        $rekomendasi->delete();

        return redirect()->route('admin.rekomendasi')->with('success', 'Rekomendasi berhasil dihapus.');
    }
}
