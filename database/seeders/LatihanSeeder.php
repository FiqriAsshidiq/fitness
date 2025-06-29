<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Latihan; 

class LatihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teknik = [
            ['kode' => 'L1', 'nama_teknik' => 'Barbell Bench Press'],
            ['kode' => 'L2', 'nama_teknik' => 'Front Squat'],
            ['kode' => 'L3', 'nama_teknik' => 'Push Up'],
            ['kode' => 'L4', 'nama_teknik' => 'Chest Fly'],
            ['kode' => 'L5', 'nama_teknik' => 'Overhead Press'],
            ['kode' => 'L6', 'nama_teknik' => 'Arnold Press'],
            ['kode' => 'L7', 'nama_teknik' => 'Lateral Raise'],
            ['kode' => 'L8', 'nama_teknik' => 'Pull-Up'],
            ['kode' => 'L9', 'nama_teknik' => 'Lat Pulldown'],
            ['kode' => 'L10', 'nama_teknik' => 'Barbell Row'],
            ['kode' => 'L11', 'nama_teknik' => 'Seated Cable Row'],
            ['kode' => 'L12', 'nama_teknik' => 'Barbell Curl'],
            ['kode' => 'L13', 'nama_teknik' => 'Dumbbell Curl'],
            ['kode' => 'L14', 'nama_teknik' => 'Hammer Curl'],
            ['kode' => 'L15', 'nama_teknik' => 'Barbell Squat'],
            ['kode' => 'L16', 'nama_teknik' => 'Leg Curl'],
            ['kode' => 'L17', 'nama_teknik' => 'Dumbbell Bench Press'],
            ['kode' => 'L18', 'nama_teknik' => 'Leg Press'],
            ['kode' => 'L19', 'nama_teknik' => 'Deadlift'],
            ['kode' => 'L20', 'nama_teknik' => 'Burpee, Snatch'],
            ['kode' => 'L21', 'nama_teknik' => 'Clean & Press'],
            ['kode' => 'L22', 'nama_teknik' => 'Face Pull'],
            ['kode' => 'L23', 'nama_teknik' => 'Rear Delt Row'],
        ];

        foreach ($teknik as $item) {
            Latihan::create($item);
        }
    }
}
