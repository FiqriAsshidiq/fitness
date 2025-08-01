<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TujuanLatihan;

class TujuanLatihanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                // 'kode' => 'TL1',
                'nama' => 'Fat Loss',
                'deskripsi' => 'Fokus menurunkan lemak tubuh dengan defisit kalori dan latihan kardio.',
            ],
            [
                // 'kode' => 'TL2',
                'nama' => 'Bodybuilding',
                'deskripsi' => 'Fokus meningkatkan massa otot melalui surplus kalori dan latihan beban.',
            ],
            [
                // 'kode' => 'TL3',
                'nama' => 'Maintenance',
                'deskripsi' => 'Menjaga kondisi tubuh dan kebugaran tanpa perubahan berat badan.',
            ],
        ];

        foreach ($data as $item) {
            TujuanLatihan::create($item);
        }
    }
}
