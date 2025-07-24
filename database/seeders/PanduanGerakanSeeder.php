<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PanduanGerakanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_gerakan' => 'Barbell Bench Press',
                'target_otot' => 'Dada',
                'deskripsi' => 'Berbaring di bench datar, genggam barbell sedikit lebih lebar dari bahu. Turunkan barbell ke dada secara perlahan, lalu dorong kembali ke atas hingga lengan lurus.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Incline Dumbbell Press',
                'target_otot' => 'Dada',
                'deskripsi' => 'Duduk di incline bench, pegang dumbbell sejajar dada. Dorong dumbbell ke atas hingga lengan lurus, lalu turunkan kembali ke posisi awal dengan kontrol.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Flat Dumbbell Flyes',
                'target_otot' => 'Dada',
                'deskripsi' => 'Berbaring di bench datar dengan dumbbell di atas dada, tangan sedikit ditekuk. Turunkan tangan ke samping secara perlahan, lalu angkat kembali seperti gerakan memeluk.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Lat Pulldown',
                'target_otot' => 'Punggung',
                'deskripsi' => 'Duduk di mesin lat pulldown, pegang bar lebar. Tarik bar ke bawah ke arah dada bagian atas, tahan sebentar, lalu lepaskan kembali ke posisi semula secara perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Seated Cable Row',
                'target_otot' => 'Punggung',
                'deskripsi' => 'Duduk di mesin cable row, genggam handle dan tarik ke arah perut sambil menjaga punggung tetap tegak. Kembalikan perlahan ke posisi awal.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Bent Over Barbell Row',
                'target_otot' => 'Punggung',
                'deskripsi' => 'Berdiri dengan lutut sedikit ditekuk dan tubuh condong ke depan. Pegang barbell, tarik ke arah perut sambil menjaga posisi punggung lurus, lalu turunkan kembali.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Shoulder Press',
                'target_otot' => 'Bahu',
                'deskripsi' => 'Duduk atau berdiri dengan dumbbell di atas bahu. Dorong dumbbell ke atas hingga lengan lurus, lalu turunkan perlahan kembali ke posisi awal.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Lateral Raise',
                'target_otot' => 'Bahu',
                'deskripsi' => 'Berdiri tegak, pegang dumbbell di samping tubuh. Angkat kedua lengan ke samping hingga sejajar bahu, lalu turunkan perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Front Raise',
                'target_otot' => 'Bahu',
                'deskripsi' => 'Pegang dumbbell di depan paha, angkat lengan lurus ke depan hingga setinggi bahu, lalu turunkan kembali dengan kontrol.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Barbell Curl',
                'target_otot' => 'Tangan',
                'deskripsi' => 'Berdiri tegak, pegang barbell dengan kedua tangan. Angkat barbell ke arah bahu dengan kontraksi biceps, lalu turunkan perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Triceps Pushdown',
                'target_otot' => 'Tangan',
                'deskripsi' => 'Berdiri di depan mesin kabel, pegang bar dengan telapak menghadap ke bawah. Dorong bar ke bawah hingga lengan lurus, lalu kembali ke posisi awal.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Squat',
                'target_otot' => 'Kaki',
                'deskripsi' => 'Berdiri tegak, kaki selebar bahu. Turunkan tubuh seperti duduk sambil menjaga punggung lurus, lalu dorong kembali ke posisi berdiri.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Leg Extension',
                'target_otot' => 'Kaki',
                'deskripsi' => 'Duduk di mesin leg extension, letakkan kaki di bawah bantalan. Dorong kaki ke atas hingga lurus, lalu turunkan kembali perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Dumbbell Curl',
                'target_otot' => 'tangan',
                'deskripsi' => 'Berdiri tegak sambil memegang dumbbell di kedua tangan, telapak tangan menghadap ke depan. Angkat dumbbell ke arah bahu, lalu turunkan perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Hammer Curl',
                'target_otot' => 'tangan',
                'deskripsi' => 'Pegang dumbbell di sisi tubuh dengan posisi telapak tangan menghadap tubuh. Angkat dumbbell hingga ke bahu, lalu turunkan secara perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Barbell Squat',
                'target_otot' => 'paha',
                'deskripsi' => 'Letakkan barbell di belakang leher di atas bahu. Turunkan tubuh seperti duduk sambil menjaga punggung tetap lurus, lalu dorong kembali ke posisi berdiri.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Leg Curl',
                'target_otot' => 'paha',
                'deskripsi' => 'Berbaring tengkurap di mesin leg curl, kaitkan pergelangan kaki ke bantalan. Tekuk lutut dan tarik bantalan ke arah bokong, lalu turunkan perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Dumbbell Bench Press',
                'target_otot' => 'dada',
                'deskripsi' => 'Berbaring di bangku datar sambil memegang dumbbell di kedua tangan. Dorong dumbbell ke atas hingga tangan lurus, lalu turunkan perlahan ke samping dada.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Leg Press',
                'target_otot' => 'kaki',
                'deskripsi' => 'Duduk di mesin leg press dan letakkan kaki di platform. Dorong platform menjauh dengan kaki hingga lurus, lalu kembali ke posisi awal dengan kontrol.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Deadlift',
                'target_otot' => 'fullbody',
                'deskripsi' => 'Berdiri di depan barbell, tekuk lutut dan pegang bar dengan tangan selebar bahu. Angkat bar dengan mendorong kaki dan meluruskan punggung.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Burpee',
                'target_otot' => 'fullbody',
                'deskripsi' => 'Dari posisi berdiri, turun ke posisi push-up, lakukan push-up, lalu loncat ke atas dengan kedua tangan terangkat. Ulangi gerakan dengan ritme cepat.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Clean & Press',
                'target_otot' => 'fullbody',
                'deskripsi' => 'Angkat barbell dari lantai ke posisi bahu, lalu tekan ke atas kepala hingga lengan lurus. Kembali ke posisi awal secara terkontrol.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Face Pull',
                'target_otot' => 'bahu',
                'deskripsi' => 'Gunakan kabel di posisi atas. Tarik tali ke arah wajah dengan siku terbuka ke samping, jaga postur tetap tegak.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Rear Delt Row',
                'target_otot' => 'bahu',
                'deskripsi' => 'Bungkukkan badan sedikit ke depan sambil memegang dumbbell. Tarik dumbbell ke arah samping tubuh dengan siku sejajar bahu.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Plank',
                'target_otot' => 'perut',
                'deskripsi' => 'Posisikan tubuh seperti push-up namun dengan lengan bawah menyentuh lantai. Tahan posisi tubuh lurus selama beberapa detik.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Crunch',
                'target_otot' => 'perut',
                'deskripsi' => 'Berbaring dengan lutut ditekuk dan tangan di belakang kepala. Angkat bahu dari lantai ke arah lutut sambil mengencangkan otot perut.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Front Dumbbell Raise',
                'target_otot' => 'bahu',
                'deskripsi' => 'Berdiri dengan dumbbell di tangan, angkat dumbbell lurus ke depan hingga sejajar bahu, lalu turunkan perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Bent-over Lateral Raise',
                'target_otot' => 'bahu',
                'deskripsi' => 'Bungkukkan badan ke depan, pegang dumbbell di bawah tubuh. Angkat kedua lengan ke samping hingga sejajar bahu, lalu turunkan perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Behind the Neck Press',
                'target_otot' => 'bahu',
                'deskripsi' => 'Duduk atau berdiri dengan barbell di belakang leher. Dorong bar ke atas hingga tangan lurus, lalu turunkan perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Concentration Curl',
                'target_otot' => 'tangan',
                'deskripsi' => 'Duduk di bangku, letakkan siku pada paha bagian dalam. Angkat dumbbell ke arah bahu, lalu turunkan perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'One-arm Overhead Extension',
                'target_otot' => 'tangan',
                'deskripsi' => 'Pegang dumbbell dengan satu tangan di atas kepala. Tekuk siku untuk menurunkan dumbbell ke belakang kepala, lalu angkat kembali.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Barbell Shrugs',
                'target_otot' => 'bahu',
                'deskripsi' => 'Berdiri tegak sambil memegang barbell di depan paha. Angkat bahu setinggi mungkin, tahan sejenak, lalu turunkan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Dumbbell Shrugs',
                'target_otot' => 'bahu',
                'deskripsi' => 'Pegang dumbbell di sisi tubuh, angkat bahu ke atas setinggi mungkin tanpa menggerakkan lengan, lalu turunkan perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Chin-up',
                'target_otot' => 'punggung',
                'deskripsi' => 'Gantung di bar dengan telapak tangan menghadap ke arahmu. Tarik tubuh ke atas hingga dagu melewati bar, lalu turunkan perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'One-arm Dumbbell Row',
                'target_otot' => 'punggung',
                'deskripsi' => 'Letakkan satu lutut dan tangan di bangku, tarik dumbbell dengan tangan lainnya ke arah pinggang, lalu turunkan perlahan.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Hyperextension',
                'target_otot' => 'punggung',
                'deskripsi' => 'Berbaring tengkurap di mesin hyperextension. Tekuk tubuh ke bawah, lalu angkat tubuh ke atas sejajar garis lurus.',
                'gif_url' => null
            ],
            [
                'nama_gerakan' => 'Standing Calf Raises',
                'target_otot' => 'betis',
                'deskripsi' => 'Berdiri tegak di atas platform atau tangga kecil. Naikkan tumit setinggi mungkin, lalu turunkan perlahan hingga tumit hampir menyentuh lantai.',
                'gif_url' => null
            ],            
        ];

        DB::table('panduan_gerakan')->insert($data);
    }
}
