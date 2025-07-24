<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AktivitasFisik;

class AktivitasFisikController extends Controller
{
    public function index()
    {
        $data = AktivitasFisik::all();
        return view('admin.aktivitasfisik.index', compact('data'));
    }

    public function create()
    {
        return view('admin.aktivitasfisik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tingkat' => 'required|string|max:255',
            'nilai' => 'required|numeric'
        ]);

        AktivitasFisik::create($request->all());

        return redirect()->route('admin.aktivitasfisik.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = AktivitasFisik::findOrFail($id);
        return view('admin.aktivitasfisik.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tingkat' => 'required|string|max:255',
            'nilai' => 'required|numeric'
        ]);

        $item = AktivitasFisik::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('admin.aktivitasfisik.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = AktivitasFisik::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.aktivitasfisik.index')->with('success', 'Data berhasil dihapus.');
    }
}
