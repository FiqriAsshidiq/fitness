<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AktivitasFisik;

class AktivitasFisikSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'tingkat' => 'Sangat Rendah',
                'nilai' => 1.2,
            ],
            [
                'tingkat' => 'Rendah',
                'nilai' => 1.375,
            ],
            [
                'tingkat' => 'Sedang',
                'nilai' => 1.55,
            ],
            [
                'tingkat' => 'Tinggi',
                'nilai' => 1.725,
            ],
            [
                'tingkat' => 'Atletik',
                'nilai' => 1.9,
            ],
        ];

        foreach ($data as $item) {
            AktivitasFisik::create($item);
        }
    }
}
