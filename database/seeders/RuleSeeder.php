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
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 1,
                'kondisi_tubuh_id' => 1,
                'created_at' => Carbon::parse('2025-07-23 23:13:32'),
                'updated_at' => Carbon::parse('2025-07-23 23:13:32'),
            ],
            [
                'id' => 2,
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 2,
                'kondisi_tubuh_id' => 1,
                'created_at' => Carbon::parse('2025-07-23 23:14:54'),
                'updated_at' => Carbon::parse('2025-07-23 23:14:54'),
            ],
            [
                'id' => 3,
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 3,
                'kondisi_tubuh_id' => 1,
                'created_at' => Carbon::parse('2025-07-23 23:16:07'),
                'updated_at' => Carbon::parse('2025-07-23 23:16:07'),
            ],
            [
                'id' => 4,
                'pengalaman_id' => 2,
                'tujuan_latihan_id' => 1,
                'kondisi_tubuh_id' => 1,
                'created_at' => Carbon::parse('2025-07-23 23:16:36'),
                'updated_at' => Carbon::parse('2025-07-23 23:16:36'),
            ],
            [
                'id' => 5,
                'pengalaman_id' => 2,
                'tujuan_latihan_id' => 2,
                'kondisi_tubuh_id' => 1,
                'created_at' => Carbon::parse('2025-07-23 23:17:23'),
                'updated_at' => Carbon::parse('2025-07-23 23:17:23'),
            ],
            [
                'id' => 6,
                'pengalaman_id' => 2,
                'tujuan_latihan_id' => 3,
                'kondisi_tubuh_id' => 1,
                'created_at' => Carbon::parse('2025-07-23 23:18:09'),
                'updated_at' => Carbon::parse('2025-07-23 23:18:09'),
            ],
            [
                'id' => 7,
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 1,
                'kondisi_tubuh_id' => 2,
                'created_at' => Carbon::parse('2025-07-23 23:21:29'),
                'updated_at' => Carbon::parse('2025-07-23 23:21:29'),
            ],
            [
                'id' => 8,
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 2,
                'kondisi_tubuh_id' => 2,
                'created_at' => Carbon::parse('2025-07-23 23:22:17'),
                'updated_at' => Carbon::parse('2025-07-23 23:22:17'),
            ],
            [
                'id' => 9,
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 3,
                'kondisi_tubuh_id' => 2,
                'created_at' => Carbon::parse('2025-07-23 23:23:11'),
                'updated_at' => Carbon::parse('2025-07-23 23:23:11'),
            ],
            [
                'id' => 10,
                'pengalaman_id' => 2,
                'tujuan_latihan_id' => 1,
                'kondisi_tubuh_id' => 2,
                'created_at' => Carbon::parse('2025-07-23 23:24:03'),
                'updated_at' => Carbon::parse('2025-07-23 23:24:03'),
            ],
            [
                'id' => 11,
                'pengalaman_id' => 2,
                'tujuan_latihan_id' => 2,
                'kondisi_tubuh_id' => 2,
                'created_at' => Carbon::parse('2025-07-23 23:24:03'),
                'updated_at' => Carbon::parse('2025-07-23 23:24:03'),
            ],
            [
                'id' => 12,
                'pengalaman_id' => 2,
                'tujuan_latihan_id' => 3,
                'kondisi_tubuh_id' => 2,
                'created_at' => Carbon::parse('2025-07-23 23:24:03'),
                'updated_at' => Carbon::parse('2025-07-23 23:24:03'),
            ],
            [
                'id' => 13,
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 1,
                'kondisi_tubuh_id' => 3,
                'created_at' => Carbon::parse('2025-07-23 23:24:03'),
                'updated_at' => Carbon::parse('2025-07-23 23:24:03'),
            ],
            [
                'id' => 14,
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 2,
                'kondisi_tubuh_id' => 3,
                'created_at' => Carbon::parse('2025-07-23 23:24:03'),
                'updated_at' => Carbon::parse('2025-07-23 23:24:03'),
            ],
            [
                'id' => 15,
                'pengalaman_id' => 1,
                'tujuan_latihan_id' => 3,
                'kondisi_tubuh_id' => 3,
                'created_at' => Carbon::parse('2025-07-23 23:24:03'),
                'updated_at' => Carbon::parse('2025-07-23 23:24:03'),
            ],
            [
                'id' => 16,
                'pengalaman_id' => 2,
                'tujuan_latihan_id' => 1,
                'kondisi_tubuh_id' => 3,
                'created_at' => Carbon::parse('2025-07-23 23:24:03'),
                'updated_at' => Carbon::parse('2025-07-23 23:24:03'),
            ],
            [
                'id' => 17,
                'pengalaman_id' => 2,
                'tujuan_latihan_id' => 2,
                'kondisi_tubuh_id' => 3,
                'created_at' => Carbon::parse('2025-07-23 23:24:03'),
                'updated_at' => Carbon::parse('2025-07-23 23:24:03'),
            ],
            [
                'id' => 18,
                'pengalaman_id' => 2,
                'tujuan_latihan_id' => 3,
                'kondisi_tubuh_id' => 3,
                'created_at' => Carbon::parse('2025-07-23 23:24:03'),
                'updated_at' => Carbon::parse('2025-07-23 23:24:03'),
            ],
        ]);
    }
}
