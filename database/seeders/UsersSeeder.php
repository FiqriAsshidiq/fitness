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
                'telphone' => '+62 83',
                'password' => Hash::make('password'), 
                'role_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Koko',
                'email' => 'Koko@gmail.com',
                'telphone' => '+62 84',
                'password' => Hash::make('password'), 
                'role_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ahmad',
                'email' => 'ahmad@gmail.com',
                'telphone' => '+62 85',
                'password' => Hash::make('password'), 
                'role_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
