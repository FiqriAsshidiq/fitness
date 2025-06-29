<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rekomendasi;

class RekomendasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
        public function run(): void
        {
            $data = [
                [
                    'kode' => 'RM1',
                    'fokus' => 'T01, T02, T04',
                    'metode_latihan' => 'Push',
                    'keterangan' => 'Pelatihan otot bagian depan: dada, bahu depan, lengan depan.'
                ],
                [
                    'kode' => 'RM2',
                    'fokus' => 'T03, T05, T06',
                    'metode_latihan' => 'Pull',
                    'keterangan' => 'Pelatihan otot bagian belakang: punggung, bahu belakang, lengan belakang.'
                ],
                [
                    'kode' => 'RM3',
                    'fokus' => 'T01–T06',
                    'metode_latihan' => 'Upper Body',
                    'keterangan' => 'Fokus seluruh otot bagian atas: dada, bahu, punggung, core.'
                ],
                [
                    'kode' => 'RM4',
                    'fokus' => 'T07–T10',
                    'metode_latihan' => 'Lower Body',
                    'keterangan' => 'Fokus otot bagian bawah: paha, glute, kaki.'
                ],
                [
                    'kode' => 'RM5',
                    'fokus' => 'T01–T10',
                    'metode_latihan' => 'Full Body',
                    'keterangan' => 'Latihan untuk seluruh bagian tubuh.'
                ],
            ];
    
            foreach ($data as $item) {
                Rekomendasi::create($item);
            }
        }
    }
