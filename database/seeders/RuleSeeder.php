<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rules')->insert([
            [
                'id' => 1,
                'kode' => 'R01',
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 1,
                'kondisi_tubuh_id' => 1,
                'created_at' => Carbon::parse('2025-07-23 23:13:32'),
                'updated_at' => Carbon::parse('2025-07-23 23:13:32'),
            ],
            [
                'id' => 2,
                'kode' => 'R02',
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 2,
                'kondisi_tubuh_id' => 1,
                'created_at' => Carbon::parse('2025-07-23 23:14:54'),
                'updated_at' => Carbon::parse('2025-07-23 23:14:54'),
            ],
            [
                'id' => 3,
                'kode' => 'R03',
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 3,
                'kondisi_tubuh_id' => 1,
                'created_at' => Carbon::parse('2025-07-23 23:16:07'),
                'updated_at' => Carbon::parse('2025-07-23 23:16:07'),
            ],
            [
                'id' => 4,
                'kode' => 'R04',
                'pengalaman_id' => 2,
                'tujuan_latihan_id' => 1,
                'kondisi_tubuh_id' => 1,
                'created_at' => Carbon::parse('2025-07-23 23:16:36'),
                'updated_at' => Carbon::parse('2025-07-23 23:16:36'),
            ],
            [
                'id' => 5,
                'kode' => 'R05',
                'pengalaman_id' => 2,
                'tujuan_latihan_id' => 2,
                'kondisi_tubuh_id' => 1,
                'created_at' => Carbon::parse('2025-07-23 23:17:23'),
                'updated_at' => Carbon::parse('2025-07-23 23:17:23'),
            ],
            [
                'id' => 6,
                'kode' => 'R06',
                'pengalaman_id' => 2,
                'tujuan_latihan_id' => 3,
                'kondisi_tubuh_id' => 1,
                'created_at' => Carbon::parse('2025-07-23 23:18:09'),
                'updated_at' => Carbon::parse('2025-07-23 23:18:09'),
            ],
            [
                'id' => 8,
                'kode' => 'R07',
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 1,
                'kondisi_tubuh_id' => 2,
                'created_at' => Carbon::parse('2025-07-23 23:21:29'),
                'updated_at' => Carbon::parse('2025-07-23 23:21:29'),
            ],
            [
                'id' => 9,
                'kode' => 'R08',
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 2,
                'kondisi_tubuh_id' => 2,
                'created_at' => Carbon::parse('2025-07-23 23:22:17'),
                'updated_at' => Carbon::parse('2025-07-23 23:22:17'),
            ],
            [
                'id' => 10,
                'kode' => 'R09',
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 3,
                'kondisi_tubuh_id' => 2,
                'created_at' => Carbon::parse('2025-07-23 23:23:11'),
                'updated_at' => Carbon::parse('2025-07-23 23:23:11'),
            ],
            [
                'id' => 11,
                'kode' => 'R10',
                'pengalaman_id' => 2,
                'tujuan_latihan_id' => 1,
                'kondisi_tubuh_id' => 2,
                'created_at' => Carbon::parse('2025-07-23 23:24:03'),
                'updated_at' => Carbon::parse('2025-07-23 23:24:03'),
            ],
        ]);
    }
}
