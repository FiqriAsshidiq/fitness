<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TargetOtot;

class TargetOtotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
    {
        $data = [
        ['kode' => 'U01', 'fokus' => 'upper body'],
        ['kode' => 'L01', 'fokus' => 'lower body'],
        ['kode' => 'F01', 'fokus' => 'full body'],
        ];

        foreach ($data as $item) {
            TargetOtot::create($item);
        }
    }

}
