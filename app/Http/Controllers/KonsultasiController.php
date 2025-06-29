<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\TargetOtot;
use App\Models\Rule;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    // Form konsultasi
    public function index()
    {
        $targetOtot = TargetOtot::all();
        return view('konsultasi.index', compact('targetOtot'));
    }

    // Proses forward chaining
    public function proses(Request $request)
    {
        $request->validate([
            'target_otot' => 'required|array|min:1',
        ]);

        $user = Auth::user();

        // Simpan data konsultasi
        $konsultasi = Konsultasi::create([
            'user_id' => $user->id,
        ]);

        $konsultasi->targetOtot()->attach($request->target_otot);

        // Ambil dan urutkan input
        $selected = collect($request->target_otot)->map(fn($id) => (int) $id)->sort()->values()->all();

        // Ambil semua rule beserta target otot dan rekomendasinya
        $rules = Rule::with('targetOtot', 'rekomendasi')->get();

        // Loop dan cocokkan aturan
        foreach ($rules as $rule) {
            $ruleTargetIds = $rule->targetOtot->pluck('id')->sort()->values()->all();

            if ($selected === $ruleTargetIds) {
                $konsultasi->update([
                    'rekomendasi_id' => $rule->rekomendasi->id ?? null
                ]);
                break;
            }
        }

        return redirect()->route('konsultasi.hasil', $konsultasi->id);
    }

    public function hasil($id)
    {
        $konsultasi = Konsultasi::with('targetOtot', 'rekomendasi.latihan')->findOrFail($id);
        return view('konsultasi.hasil', compact('konsultasi'));
    }
}
