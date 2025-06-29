<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\TargetOtot;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rule::with('targetOtot')->get();
        return view('rule.index', compact('rules'));
    }

    public function create()
    {
        $targetOtot = TargetOtot::all();
        return view('rule.create', compact('targetOtot'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'target_otot' => 'required|array|min:1',
        ]);

        $rule = Rule::create(); // kosong, karena tidak punya kolom lain

        $rule->targetOtot()->attach($request->target_otot);

        return redirect()->route('rule')->with('success', 'Aturan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rule = Rule::with('targetOtot')->findOrFail($id);
        $targetOtot = TargetOtot::all();
        return view('rule.edit', compact('rule', 'targetOtot'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'target_otot' => 'required|array|min:1',
        ]);

        $rule = Rule::findOrFail($id);
        $rule->targetOtot()->sync($request->target_otot);

        return redirect()->route('rule')->with('success', 'Aturan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rule = Rule::findOrFail($id);
        $rule->targetOtot()->detach();
        $rule->delete();

        return redirect()->route('rule')->with('success', 'Aturan berhasil dihapus.');
    }
}
