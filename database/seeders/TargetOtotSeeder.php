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
            ['kode' => 'U01', 'fokus' => 'melatih otot tubuh bagian atas'],
            ['kode' => 'L01', 'fokus' => 'melatih otot tubuh bagian bawah'],
            ['kode' => 'F01', 'fokus' => 'melatih seluruh bagian tubuh'],
        ];

        foreach ($data as $item) {
            TargetOtot::create($item);
        }
    }

}
