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
        $data = [
            ['kode' => 'L1', 'nama_teknik' => 'Barbell Bench Press', 'alat' => 'Barbell'],
            ['kode' => 'L2', 'nama_teknik' => 'Front Squat', 'alat' => 'Barbell'],
            ['kode' => 'L3', 'nama_teknik' => 'Push Up', 'alat' => 'Bodyweight'],
            ['kode' => 'L4', 'nama_teknik' => 'Chest Fly', 'alat' => 'Dumbbell'],
            ['kode' => 'L5', 'nama_teknik' => 'Overhead Press', 'alat' => 'Barbell'],
            ['kode' => 'L6', 'nama_teknik' => 'Arnold Press', 'alat' => 'Dumbbell'],
            ['kode' => 'L7', 'nama_teknik' => 'Lateral Raise', 'alat' => 'Dumbbell'],
            ['kode' => 'L8', 'nama_teknik' => 'Pull-Up', 'alat' => 'Pull-up Bar'],
            ['kode' => 'L9', 'nama_teknik' => 'Lat Pulldown', 'alat' => 'Lat Pulldown Machine'],
            ['kode' => 'L10', 'nama_teknik' => 'Barbell Row', 'alat' => 'Barbell'],
            ['kode' => 'L11', 'nama_teknik' => 'Seated Cable Row', 'alat' => 'Cable Machine'],
            ['kode' => 'L12', 'nama_teknik' => 'Barbell Curl', 'alat' => 'Barbell'],
            ['kode' => 'L13', 'nama_teknik' => 'Dumbbell Curl', 'alat' => 'Dumbbell'],
            ['kode' => 'L14', 'nama_teknik' => 'Hammer Curl', 'alat' => 'Dumbbell'],
            ['kode' => 'L15', 'nama_teknik' => 'Barbell Squat', 'alat' => 'Barbell'],
            ['kode' => 'L16', 'nama_teknik' => 'Leg Curl', 'alat' => 'Leg Curl Machine'],
            ['kode' => 'L17', 'nama_teknik' => 'Dumbbell Bench Press', 'alat' => 'Dumbbell'],
            ['kode' => 'L18', 'nama_teknik' => 'Leg Press', 'alat' => 'Leg Press Machine'],
            ['kode' => 'L19', 'nama_teknik' => 'Deadlift', 'alat' => 'Barbell'],
            ['kode' => 'L20', 'nama_teknik' => 'Burpee', 'alat' => 'Bodyweight'],
            ['kode' => 'L21', 'nama_teknik' => 'Clean & Press', 'alat' => 'Barbell'],
            ['kode' => 'L22', 'nama_teknik' => 'Face Pull', 'alat' => 'Cable Machine'],
            ['kode' => 'L23', 'nama_teknik' => 'Rear Delt Row', 'alat' => 'Cable Machine'],
        ];

        foreach ($data as $item) {
            Latihan::create($item);
        }
    }
}
