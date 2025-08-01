<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LatihanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('latihan')->insert([
            [
                // 'kode' => 'L1',
                'nama_teknik' => 'Barbell Bench Press',
                'alat' => 'Barbell',
                'kategori_otot' => 'dada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L2',
                'nama_teknik' => 'Front Squat',
                'alat' => 'Barbell',
                'kategori_otot' => 'paha',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L3',
                'nama_teknik' => 'Push Up',
                'alat' => 'Bodyweight',
                'kategori_otot' => 'dada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L4',
                'nama_teknik' => 'Chest Fly',
                'alat' => 'Dumbbell',
                'kategori_otot' => 'dada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L5',
                'nama_teknik' => 'Overhead Press',
                'alat' => 'Barbell',
                'kategori_otot' => 'bahu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L6',
                'nama_teknik' => 'Arnold Press',
                'alat' => 'Dumbbell',
                'kategori_otot' => 'bahu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L7',
                'nama_teknik' => 'Lateral Raise',
                'alat' => 'Dumbbell',
                'kategori_otot' => 'bahu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L8',
                'nama_teknik' => 'Pull-Up',
                'alat' => 'Pull-up Bar',
                'kategori_otot' => 'punggung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L9',
                'nama_teknik' => 'Lat Pulldown',
                'alat' => 'Lat Pulldown Machine',
                'kategori_otot' => 'punggung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L10',
                'nama_teknik' => 'Barbell Row',
                'alat' => 'Barbell',
                'kategori_otot' => 'punggung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L11',
                'nama_teknik' => 'Seated Cable Row',
                'alat' => 'Cable Machine',
                'kategori_otot' => 'punggung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L12',
                'nama_teknik' => 'Barbell Curl',
                'alat' => 'Barbell',
                'kategori_otot' => 'tangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L13',
                'nama_teknik' => 'Dumbbell Curl',
                'alat' => 'Dumbbell',
                'kategori_otot' => 'tangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L14',
                'nama_teknik' => 'Hammer Curl',
                'alat' => 'Dumbbell',
                'kategori_otot' => 'tangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L15',
                'nama_teknik' => 'Barbell Squat',
                'alat' => 'Barbell',
                'kategori_otot' => 'paha',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L16',
                'nama_teknik' => 'Leg Curl',
                'alat' => 'Leg Curl Machine',
                'kategori_otot' => 'paha',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L17',
                'nama_teknik' => 'Dumbbell Bench Press',
                'alat' => 'Dumbbell',
                'kategori_otot' => 'dada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L18',
                'nama_teknik' => 'Leg Press',
                'alat' => 'Leg Press Machine',
                'kategori_otot' => 'kaki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L19',
                'nama_teknik' => 'Deadlift',
                'alat' => 'Barbell',
                'kategori_otot' => 'fullbody',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L20',
                'nama_teknik' => 'Burpee',
                'alat' => 'Bodyweight',
                'kategori_otot' => 'fullbody',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L21',
                'nama_teknik' => 'Clean & Press',
                'alat' => 'Barbell',
                'kategori_otot' => 'fullbody',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L22',
                'nama_teknik' => 'Face Pull',
                'alat' => 'Cable Machine',
                'kategori_otot' => 'bahu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L23',
                'nama_teknik' => 'Rear Delt Row',
                'alat' => 'Cable Machine',
                'kategori_otot' => 'bahu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L24',
                'nama_teknik' => 'Plank',
                'alat' => 'Bodyweight',
                'kategori_otot' => 'perut',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L25',
                'nama_teknik' => 'Crunch',
                'alat' => 'Bodyweight',
                'kategori_otot' => 'perut',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L26',
                'nama_teknik' => 'Front Dumbbell Raise',
                'alat' => 'Dumbbell',
                'kategori_otot' => 'bahu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L27',
                'nama_teknik' => 'Bent-over Lateral Raise',
                'alat' => 'Dumbbell',
                'kategori_otot' => 'bahu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L28',
                'nama_teknik' => 'Behind the Neck Press',
                'alat' => 'Barbell',
                'kategori_otot' => 'bahu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L29',
                'nama_teknik' => 'Concentration Curl',
                'alat' => 'Dumbbell',
                'kategori_otot' => 'tangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L30',
                'nama_teknik' => 'One-arm Overhead Extension',
                'alat' => 'Dumbbell',
                'kategori_otot' => 'tangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L31',
                'nama_teknik' => 'Barbell Shrugs',
                'alat' => 'Barbell',
                'kategori_otot' => 'bahu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L32',
                'nama_teknik' => 'Dumbbell Shrugs',
                'alat' => 'Dumbbell',
                'kategori_otot' => 'bahu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L33',
                'nama_teknik' => 'Bent-over Barbell Row',
                'alat' => 'Barbell',
                'kategori_otot' => 'punggung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L34',
                'nama_teknik' => 'Chin-up',
                'alat' => 'Pull-up Bar',
                'kategori_otot' => 'punggung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L35',
                'nama_teknik' => 'One-arm Dumbbell Row',
                'alat' => 'Dumbbell',
                'kategori_otot' => 'punggung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L36',
                'nama_teknik' => 'Hyperextension',
                'alat' => 'Hyper Bench',
                'kategori_otot' => 'punggung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'kode' => 'L37',
                'nama_teknik' => 'Standing Calf Raises',
                'alat' => 'Calf Raise Machine',
                'kategori_otot' => 'betis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
