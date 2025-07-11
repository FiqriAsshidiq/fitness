<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Hasil Rekomendasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">

            @if ($konsultasi)
                <h3 class="text-xl font-bold mb-4">Detail Konsultasi & Rekomendasi</h3>

                <table class="table-auto w-full border border-gray-300 mb-6 text-sm">
                    <tbody>
                        <tr>
                            <th class="border px-4 py-2 bg-gray-100">Jenis Kelamin</th>
                            <td class="border px-4 py-2">{{ ucfirst($konsultasi->jenis_kelamin) }}</td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2 bg-gray-100">Usia</th>
                            <td class="border px-4 py-2">{{ $konsultasi->usia }} tahun</td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2 bg-gray-100">Berat / Tinggi</th>
                            <td class="border px-4 py-2">{{ $konsultasi->berat_badan }} kg / {{ $konsultasi->tinggi_badan }} cm</td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2 bg-gray-100">Aktivitas Fisik</th>
                            <td class="border px-4 py-2">{{ $konsultasi->aktivitasFisik->tingkat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2 bg-gray-100">Pengalaman</th>
                            <td class="border px-4 py-2">{{ $konsultasi->pengalaman->level ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2 bg-gray-100">Tujuan Latihan</th>
                            <td class="border px-4 py-2">{{ $konsultasi->tujuanLatihan->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2 bg-gray-100">Target Otot</th>
                            <td class="border px-4 py-2">
                                @foreach($konsultasi->targetOtot as $otot)
                                    <span class="">{{ $otot->fokus }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2 bg-gray-100">BMR</th>
                            <td class="border px-4 py-2">{{ $konsultasi->bmr ?? '-' }} kalori</td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2 bg-gray-100">TDEE</th>
                            <td class="border px-4 py-2">{{ $konsultasi->tdee ?? '-' }} kalori/hari</td>
                        </tr>
                    </tbody>
                </table>

                <h4 class="text-lg font-semibold mb-2 ">Rekomendasi Latihan</h4>
                @if ($konsultasi->rekomendasi)
                    <p><strong>Kode:</strong> {{ $konsultasi->rekomendasi->kode }}</p>
                    <p><strong>Metode Latihan:</strong> {{ $konsultasi->rekomendasi->metode_latihan }}</p>
                    <p><strong>Keterangan:</strong> {{ $konsultasi->rekomendasi->keterangan }}</p>

                    {{-- Latihan terkait --}}
                    @if ($konsultasi->rekomendasi->latihan && $konsultasi->rekomendasi->latihan->count() > 0)
                        <div class="mt-4">
                            <h5 class="font-bold mb-2">Daftar Teknik Latihan:</h5>
                            <table class="table-auto w-full border border-gray-300 text-sm">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="border px-3 py-2">Nama Teknik</th>
                                        <th class="border px-3 py-2">Alat</th>
                                        <th class="border px-3 py-2">Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($konsultasi->rekomendasi->latihan as $latihan)
                                        <tr>
                                            <td class="border px-3 py-2">{{ $latihan->nama_teknik }}</td>
                                            <td class="border px-3 py-2">{{ $latihan->alat ?? '-' }}</td>
                                            <td class="border px-3 py-2">{{ $latihan->deskripsi ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-600 mt-2">Belum ada teknik latihan terhubung.</p>
                    @endif
                @else
                    <div class="bg-yellow-100 text-yellow-800 p-3 rounded border border-yellow-300 mt-4">
                        Tidak ditemukan rekomendasi berdasarkan data konsultasi Anda.
                    </div>
                @endif

            @else
                <div class="bg-yellow-100 text-yellow-800 p-4 rounded border border-yellow-300">
                    Anda belum melakukan konsultasi. Silakan isi form konsultasi terlebih dahulu.
                </div>
                <a href="{{ route('konsultasi.index') }}" class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Mulai Konsultasi
                </a>
            @endif
        </div>
    </div>
</x-app-layout>
