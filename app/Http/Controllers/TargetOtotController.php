<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TargetOtot;

class TargetOtotController extends Controller
{
    public function index()
    {
        $targetOtot = TargetOtot::all();
        return view('admin.Otot.index', compact('targetOtot'));
    }

    public function create()
    {
        return view('admin.Otot.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fokus' => 'required|string|max:255',
        ]);

        TargetOtot::create($request->only( 'fokus'));

        return redirect()->route('admin.otot')->with('success', 'Target Otot berhasil ditambahkan');
    }

    public function edit($id)
    {
        $targetOtot = TargetOtot::findOrFail($id);
        return view('admin.otot.edit', compact('targetOtot'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fokus' => 'required|string|max:255',
        ]);

        $targetOtot = TargetOtot::findOrFail($id);
        $targetOtot->update($request->only( 'fokus'));

        return redirect()->route('admin.otot')->with('success', 'Target Otot berhasil diperbarui');
    }

    public function destroy($id)
    {
        $targetOtot = TargetOtot::findOrFail($id);
        $targetOtot->delete();

        return redirect()->route('admin.otot')->with('success', 'Target Otot berhasil dihapus');
    }
}
