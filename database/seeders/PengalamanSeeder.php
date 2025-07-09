<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengalaman;


class PengalamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
    {
$data = [
        [
            'kode' => 'P1',
            'level' => 'Pemula',
            'deskripsi' => ' baru latihan mengenal gym 1-3 bulan',
        ],
        [
            'kode' => 'P2',
            'level' => 'Menengah',
            'deskripsi' => 'sudah terbiasa dan rutin latihan gym 3-6 bulan',
        ],
        [
            'kode' => 'P3',
            'level' => 'Lanjutan',
            'deskripsi' => 'berpengalaman dan fokus membentuk otot',
        ],
    ];
        foreach ($data as $item) {
            Pengalaman::create($item);
        }
    }
}
