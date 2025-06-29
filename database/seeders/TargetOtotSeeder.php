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
            ['kode' => 'T01', 'fokus' => 'Dada (Chest)'],
            ['kode' => 'T02', 'fokus' => 'Bahu depan (anterior)'],
            ['kode' => 'T03', 'fokus' => 'Punggung (Back)'],
            ['kode' => 'T04', 'fokus' => 'Lengan Depan (Bicep)'],
            ['kode' => 'T05', 'fokus' => 'Bahu Belakang (posterior)'],
            ['kode' => 'T06', 'fokus' => 'Lengan Belakang (Tricep)'],
            ['kode' => 'T07', 'fokus' => 'Paha Depan (Quadriceps)'],
            ['kode' => 'T08', 'fokus' => 'Perut, Pinggul, Bokong (Core)'],
            ['kode' => 'T09', 'fokus' => 'Paha Belakang (Hamstring)'],
            ['kode' => 'T10', 'fokus' => 'Kaki (Gastroc)'],
        ];

        foreach ($data as $item) {
            TargetOtot::create($item);
        }
    }

}
