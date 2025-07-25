<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PanduanNutrisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $data = [
        [
            'nama_makanan' => 'Nasi, putih, matang',
            'kategori'     => 'Serealia',
            'energi'       => 130.0,
            'protein'      => 2.69,
            'lemak'        => 0.28,
            'serat'        => 0.4,
            'gambar_url'   => 'gamNutrisi/nasi.jpeg'

        ],
        [
            'nama_makanan' => 'Ubi jalar, mentah',
            'kategori'     => 'Umbi',
            'energi'       => 86.0,
            'protein'      => 1.57,
            'lemak'        => 0.05,
            'serat'        => 3.0,
            'gambar_url'   => 'gamNutrisi/Ubi jalar.jpeg'
        ],
        [
            'nama_makanan' => 'Singkong, mentah',
            'kategori'     => 'Umbi',
            'energi'       => 160.0,
            'protein'      => 1.36,
            'lemak'        => 0.28,
            'serat'        => 1.8,
            'gambar_url'   => 'gamNutrisi/Singkong, mentah.jpeg'
        ],
        [
            'nama_makanan' => 'Jagung kuning, rebus',
            'kategori'     => 'Serealia',
            'energi'       => 154.0,
            'protein'      => 5.5,
            'lemak'        => 0.1,
            'serat'        => 0.9,
            'gambar_url'   => 'gamNutrisi/Jagung.jpeg'
        ],
        [
            'nama_makanan' => 'Kacang merah, rebus',
            'kategori'     => 'Kacang-kacangan',
            'energi'       => 127.0,
            'protein'      => 7.73,
            'lemak'        => 0.53,
            'serat'        => 6.5,
            'gambar_url'   => 'gamNutrisi/Kacang merah.jpeg'
        ],
        [
            'nama_makanan' => 'Daging sapi gemuk, segar',
            'kategori'     => 'Daging',
            'energi'       => 273.0,
            'protein'      => 17.5,
            'lemak'        => 22.0,
            'serat'        => 0.0,
            'gambar_url'   => 'gamNutrisi/Daging sapi.jpeg'
        ],
        [
            'nama_makanan' => 'Daging kambing, segar',
            'kategori'     => 'Daging',
            'energi'       => 149.0,
            'protein'      => 16.6,
            'lemak'        => 9.2,
            'serat'        => 0.0,
            'gambar_url'   => 'gamNutrisi/Daging kambing.jpeg'
        ],
        [
            'nama_makanan' => 'Daging sapi lemak sedang, segar',
            'kategori'     => 'Daging',
            'energi'       => 201.0,
            'protein'      => 18.8,
            'lemak'        => 14.0,
            'serat'        => 0.0,
            'gambar_url'   => 'gamNutrisi/Daging sapi lemak.jpeg'
        ],
        [
            'nama_makanan' => 'daging Ayam, segar',
            'kategori'     => 'Daging',
            'energi'       => 298.0,
            'protein'      => 18.2,
            'lemak'        => 25.0,
            'serat'        => 0.0,
            'gambar_url'   => 'gamNutrisi/daging Ayam.jpeg'
        ],
    ];

    DB::table('panduan_nutrisi')->insert($data);

    }
}
