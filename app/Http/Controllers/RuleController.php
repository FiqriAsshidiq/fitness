<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;
use App\Models\TargetOtot;
use App\Models\Pengalaman;
use App\Models\TujuanLatihan;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rule::with(['targetOtot', 'pengalaman', 'tujuanLatihan'])->get();
        return view('rule.index', compact('rules'));
    }

    public function create()
    {
        $targetOtot = TargetOtot::all();
        $pengalaman = Pengalaman::all();
        $tujuan = TujuanLatihan::all(); // Tambah ini
        return view('rule.create', compact('targetOtot', 'pengalaman', 'tujuan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'pengalaman_id' => 'required|exists:pengalaman,id',
            'tujuan_latihan_id' => 'required|exists:tujuan_latihan,id',
            'target_otot' => 'required|array|min:1',
        ]);

        $rule = Rule::create([
            'kode' => $request->kode,
            'pengalaman_id' => $request->pengalaman_id,
            'tujuan_latihan_id' => $request->tujuan_latihan_id,
        ]);

        $rule->targetOtot()->attach($request->target_otot);

        return redirect()->route('rule')->with('success', 'Rule berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rule = Rule::with('targetOtot')->findOrFail($id);
        $targetOtot = TargetOtot::all();
        $pengalaman = Pengalaman::all();
        $tujuan = TujuanLatihan::all(); // Tambah ini
        return view('rule.edit', compact('rule', 'targetOtot', 'pengalaman', 'tujuan'));
    }

    public function update(Request $request, $id)
    {
        $rule = Rule::findOrFail($id);

        $request->validate([
            'kode' => 'required',
            'pengalaman_id' => 'required|exists:pengalaman,id',
            'tujuan_latihan_id' => 'required|exists:tujuan_latihan,id',
            'target_otot' => 'required|array|min:1',
        ]);

        $rule->update([
            'kode' => $request->kode,
            'pengalaman_id' => $request->pengalaman_id,
            'tujuan_latihan_id' => $request->tujuan_latihan_id,
        ]);

        $rule->targetOtot()->sync($request->target_otot);

        return redirect()->route('rule')->with('success', 'Rule berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rule = Rule::findOrFail($id);
        $rule->targetOtot()->detach();
        $rule->delete();

        return redirect()->route('rule')->with('success', 'Rule berhasil dihapus.');
    }
}
