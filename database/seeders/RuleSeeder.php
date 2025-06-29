<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rekomendasi;
use App\Models\Rule;
use App\Models\TargetOtot;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rules = [
            'RM1' => ['T01', 'T02', 'T04'],
            'RM2' => ['T03', 'T05', 'T06'],
            'RM3' => ['T01', 'T02', 'T03', 'T04', 'T05', 'T06'],
            'RM4' => ['T07', 'T08', 'T09', 'T10'],
            'RM5' => ['T01', 'T02', 'T03', 'T04', 'T05', 'T06', 'T07', 'T08', 'T09', 'T10'],
        ];

        foreach ($rules as $kodeRekomendasi => $targetOtotKodes) {
            $rekomendasi = Rekomendasi::where('kode', $kodeRekomendasi)->first();
            if ($rekomendasi) {
                $rule = Rule::create([
                    'rekomendasi_id' => $rekomendasi->id,
                ]);

                // Ambil id target otot berdasarkan kode
                $targetIds = \App\Models\TargetOtot::whereIn('kode', $targetOtotKodes)->pluck('id');
                $rule->targetOtot()->attach($targetIds);
            }
        }
    }
}
