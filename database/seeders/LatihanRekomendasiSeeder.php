<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rekomendasi;
use App\Models\Latihan;

class LatihanRekomendasiSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua latihan
        $latihan = Latihan::all()->keyBy('kode'); // agar mudah dicari

        // Mapping latihan berdasarkan metode
        $pushLatihan = ['L1', 'L3', 'L4', 'L5', 'L6', 'L7']; // dada, bahu depan
        $pullLatihan = ['L8', 'L9', 'L10', 'L11', 'L22', 'L23']; // punggung, bahu belakang
        $upperBodyLatihan = array_merge($pushLatihan, $pullLatihan, ['L12', 'L13', 'L14']); // lengan juga
        $lowerBodyLatihan = ['L2', 'L15', 'L16', 'L18', 'L19']; // kaki, glute
        $fullBodyLatihan = array_merge($upperBodyLatihan, $lowerBodyLatihan, ['L20', 'L21']); // gabungan total

        // Ambil semua rekomendasi
        $rekomendasiList = Rekomendasi::all();

        foreach ($rekomendasiList as $rekomendasi) {
            $kode = $rekomendasi->kode;
            $metode = strtolower($rekomendasi->metode_latihan);

            $latihanToAttach = [];

            switch ($metode) {
                case 'push':
                    $latihanToAttach = $this->getLatihanIds($pushLatihan, $latihan);
                    break;
                case 'pull':
                    $latihanToAttach = $this->getLatihanIds($pullLatihan, $latihan);
                    break;
                case 'upper body':
                    $latihanToAttach = $this->getLatihanIds($upperBodyLatihan, $latihan);
                    break;
                case 'lower body':
                    $latihanToAttach = $this->getLatihanIds($lowerBodyLatihan, $latihan);
                    break;
                case 'full body':
                    $latihanToAttach = $this->getLatihanIds($fullBodyLatihan, $latihan);
                    break;
                default:
                    $latihanToAttach = []; // fallback
            }

            $rekomendasi->latihan()->sync($latihanToAttach);
        }

        $this->command->info('Relasi latihan berdasarkan metode_latihan telah dibuat.');
    }

    private function getLatihanIds(array $kodeList, $latihanCollection)
    {
        return collect($kodeList)
            ->map(fn($kode) => $latihanCollection[$kode]->id ?? null)
            ->filter()
            ->toArray();
    }
}
