<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Hasil Rekomendasi Konsultasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">

                @if($konsultasi && $konsultasi->rekomendasi)
                <h3 class="text-lg font-semibold mb-4 text-blue-700">Detail Konsultasi</h3>

                {{-- TABEL DETAIL KONSULTASI --}}
                <table class="table-auto w-full mb-6 text-left border border-gray-200">
                    <tbody>
                        <tr>
                            <th class="px-4 py-2 border w-1/3">Jenis Kelamin</th>
                            <td class="px-4 py-2 border">{{ ucfirst($konsultasi->jenis_kelamin) }}</td>
                        </tr>
                        <tr>
                            <th class="px-4 py-2 border">Usia</th>
                            <td class="px-4 py-2 border">{{ $konsultasi->usia }} tahun</td>
                        </tr>
                        <tr>
                            <th class="px-4 py-2 border">Tinggi / Berat</th>
                            <td class="px-4 py-2 border">{{ $konsultasi->tinggi_badan }} cm / {{ $konsultasi->berat_badan }} kg</td>
                        </tr>
                        <tr>
                            <th class="px-4 py-2 border">Aktivitas Fisik</th>
                            <td class="px-4 py-2 border">{{ $konsultasi->aktivitasFisik->tingkat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="px-4 py-2 border">Pengalaman</th>
                            <td class="px-4 py-2 border">{{ $konsultasi->pengalaman->level ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="px-4 py-2 border">Tujuan Latihan</th>
                            <td class="px-4 py-2 border">{{ $konsultasi->tujuanLatihan->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="px-4 py-2 border">Target Otot</th>
                            <td class="px-4 py-2 border">
                                @foreach($konsultasi->targetOtot as $otot)
                                    <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded mr-1">{{ $otot->fokus }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th class="px-4 py-2 border">BMR</th>
                            <td class="px-4 py-2 border">{{ number_format($konsultasi->bmr, 2) }} kcal</td>
                        </tr>
                        <tr>
                            <th class="px-4 py-2 border">TDEE</th>
                            <td class="px-4 py-2 border">{{ number_format($konsultasi->tdee, 2) }} kcal</td>
                        </tr>
                    </tbody>
                </table>

                {{-- TABEL REKOMENDASI --}}
                <h3 class="text-lg font-semibold mb-2 text-green-700">Rekomendasi Latihan</h3>
                <table class="table-auto w-full mb-6 text-left border border-gray-200">
                    <tbody>
                        <tr>
                            <th class="px-4 py-2 border w-1/3">Kode</th>
                            <td class="px-4 py-2 border">{{ $konsultasi->rekomendasi->kode }}</td>
                        </tr>
                        <tr>
                            <th class="px-4 py-2 border">Metode Latihan</th>
                            <td class="px-4 py-2 border">{{ $konsultasi->rekomendasi->metode_latihan }}</td>
                        </tr>
                        <tr>
                            <th class="px-4 py-2 border">Keterangan</th>
                            <td class="px-4 py-2 border">{{ $konsultasi->rekomendasi->keterangan }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4">
                    <h5>Kebutuhan Nutrisi Harian</h5>
                    <p><strong>Kalori:</strong> {{ $konsultasi->kalori }} kcal/hari</p>
                    <p><strong>Protein:</strong> {{ $konsultasi->protein }} gram/hari</p>
                </div>


                {{-- TEKNIK LATIHAN --}}
                <h4 class="text-md font-semibold mb-2 text-purple-700">Teknik Latihan:</h4>
                @if($konsultasi->rekomendasi->latihan->count() > 0)
                    <table class="table-auto w-full border border-gray-300 mb-6">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">Nama Teknik</th>
                                <th class="px-4 py-2 border">Alat</th>
                                <th class="px-4 py-2 border">Otot</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($konsultasi->rekomendasi->latihan as $latihan)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $latihan->nama_teknik }}</td>
                                    <td class="px-4 py-2 border">{{ $latihan->alat ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $latihan->kategori_otot ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600 mb-6">Belum ada teknik latihan terhubung.</p>
                @endif

<!-- Jadwal Mingguan -->
<div class="card mt-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Jadwal Latihan Mingguan</h5>
    </div>
    <div class="card-body">
        @if(count($jadwal) > 0)
            @foreach ($jadwal as $hari => $latihans)
                <h6 class="mt-3 font-semibold text-blue-700">{{ $hari }}</h6>
                @if(count($latihans) > 0)
                    <ul class="list-disc ml-6 text-sm">
                        @foreach ($latihans as $latihan)
                            <li>{{ $latihan->nama_teknik ?? $latihan->nama }} ({{ ucfirst($latihan->kategori_otot) ?? '-' }})</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-600">Tidak ada latihan untuk hari ini.</p>
                @endif
            @endforeach
        @else
            <p class="text-red-600">Tidak ada jadwal latihan yang tersedia.</p>
        @endif
    </div>
</div>

                @else
                    <div class="text-red-700 bg-yellow-100 p-4 rounded border border-yellow-300">
                        Belum ada data konsultasi atau rekomendasi yang tersedia. Silakan lakukan konsultasi terlebih dahulu.
                    </div>
                @endif

                <div class="mt-6">
                    <a href="{{ route('member.konsultasi') }}" class="inline-block bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">
                        ← Kembali ke Konsultasi
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
