<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KondisiTubuhSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [ 'Kondisi' => 'Sehat'],
            [ 'Kondisi' => 'Pengidap CVD'],
            [ 'Kondisi' => 'Pengidap Gerd'],
            [ 'Kondisi' => 'Pengidap Asma'],
            [ 'Kondisi' => 'Cedera Bahu'],
        ];

        DB::table('kondisi_tubuh')->insert($data);
    }
}
