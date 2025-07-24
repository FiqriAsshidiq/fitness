<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
 [
            'name' => 'Fiqri',
            'email' => 'Fiqri@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
            'telphone' => '+62 83',
            'berat_badan' => 60,
            'tinggi_badan' => 170,
            'jenis_kelamin' => 'pria',
            'usia' => 22,
            'foto_member' => 'logodashboard2.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Koko',
            'email' => 'Koko@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
            'telphone' => '+62 84',
            'berat_badan' => 70,
            'tinggi_badan' => 175,
            'jenis_kelamin' => 'pria',
            'usia' => 24,
            'foto_member' => 'logodashboard2.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Ahmad',
            'email' => 'ahmad@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'telphone' => '+62 85',
            'berat_badan' => 68,
            'tinggi_badan' => 172,
            'jenis_kelamin' => 'pria',
            'usia' => 23,
            'foto_member' => 'logodashboard2.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        ]);
    }
}
