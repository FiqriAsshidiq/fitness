<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 30px;">
            {{ __('Hasil Konsultasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            @if(isset($bmr) && isset($tdee))
                <div class="bg-gray-100 p-4 rounded mb-6">
                    <p><strong>BMR:</strong> {{ number_format($bmr, 2) }} kalori</p>
                    <p><strong>TDEE:</strong> {{ number_format($tdee, 2) }} kalori/hari</p>
                </div>
            @endif

            @if($konsultasi->rekomendasi)
                <div class="mb-6">
                    <p><strong>Jenis Kelamin:</strong> {{ ucfirst($konsultasi->jenis_kelamin) }}</p>
                    <p><strong>Usia:</strong> {{ $konsultasi->usia }} tahun</p>
                    <p><strong>Berat/Tinggi:</strong> {{ $konsultasi->berat_badan }} kg / {{ $konsultasi->tinggi_badan }} cm</p>
                    <p><strong>Aktivitas:</strong> {{ $konsultasi->aktivitasFisik->tingkat ?? '-' }}</p>
                    <p><strong>Pengalaman:</strong> {{ $konsultasi->pengalaman->level ?? '-' }}</p>
                    <p><strong>Tujuan Latihan:</strong> {{ $konsultasi->tujuanLatihan->nama ?? '-' }}</p>
                    <p><strong>Target Otot:</strong>
                        @foreach($konsultasi->targetOtot as $otot)
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded inline-block mr-1">{{ $otot->fokus }}</span>
                        @endforeach
                    </p>
                    <hr class="my-4">
                    <p><strong>Kode Rekomendasi:</strong> {{ $konsultasi->rekomendasi->kode }}</p>
                    <p><strong>Metode Latihan:</strong> {{ $konsultasi->rekomendasi->metode_latihan }}</p>
                    <p><strong>Keterangan:</strong> {{ $konsultasi->rekomendasi->keterangan }}</p>
                </div>

                @if($konsultasi->rekomendasi->latihan && count($konsultasi->rekomendasi->latihan) > 0)
                    <h3 class="text-lg font-semibold mb-2">Daftar Teknik Latihan:</h3>
                    <table class="table-auto w-full text-left border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">Nama Teknik</th>
                                <th class="px-4 py-2 border">Alat</th>
                                <th class="px-4 py-2 border">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($konsultasi->rekomendasi->latihan as $latihan)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $latihan->nama_teknik }}</td>
                                    <td class="px-4 py-2 border">{{ $latihan->alat ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $latihan->deskripsi ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600 mt-4">Belum ada teknik latihan terhubung dengan rekomendasi ini.</p>
                @endif
            @else
                <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
                    Tidak ditemukan rekomendasi berdasarkan kombinasi input Anda.
                </div>
            @endif

            <div class="mt-6">
                <a href="{{ route('konsultasi.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">
                    ← Kembali ke Konsultasi
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
