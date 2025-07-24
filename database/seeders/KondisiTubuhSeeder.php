<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KondisiTubuhSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kode' => 'K01', 'Kondisi' => 'Sehat'],
            ['kode' => 'K02', 'Kondisi' => 'Pengidap CVD'],
            ['kode' => 'K03', 'Kondisi' => 'Pengidap Gerd'],
            ['kode' => 'K04', 'Kondisi' => 'Pengidap Asma'],
            ['kode' => 'K05', 'Kondisi' => 'Cedera Bahu'],
        ];

        DB::table('kondisi_tubuh')->insert($data);
    }
}
