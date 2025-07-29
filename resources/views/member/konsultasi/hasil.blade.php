<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 40px;">
            {{ __('Hasil Rekomendasi Konsultasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">

                @if($konsultasi && $konsultasi->rekomendasi)
                <h3 class="text-lg font-semibold mb-4 text-blue-700">Detail Konsultasi</h3>

                {{-- TABEL DETAIL KONSULTASI --}}
                <table class="table-auto w-full mb-6 text-left border border-gray-200">
                    <tbody>
                        <tr>
                            <th class="px-4 py-2 border w-1/3">Jenis Kelamin</th>
                            <td class="px-4 py-2 border">{{ Auth::user()->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <th class="px-4 py-2 border">Usia</th>
                            <td class="px-4 py-2 border">{{ Auth::user()->usia }} tahun</td>
                        </tr>
                        <tr>
                            <th class="px-4 py-2 border">Tinggi / Berat</th>
                            <td class="px-4 py-2 border">{{ Auth::user()->tinggi_badan }} cm / {{ Auth::user()->berat_badan }} kg</td>
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
                                    <span class="inline-block  px-2 py-1 rounded mr-1">{{ $otot->fokus }}</span>
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
                <h3 class="text-lg font-semibold mb-2">Rekomendasi </h3>
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
                            <th class="px-4 py-2 border">Nutrisi</th>
                            <td class="px-4 py-2 border">{{ $konsultasi->rekomendasi->nutrisi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="px-4 py-2 border">Catatan</th>
                            <td class="px-4 py-2 border">{{ $konsultasi->rekomendasi->catatan ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4">
                    <h5 class="text-lg font-semibold mb-2">Kebutuhan Nutrisi Harian</h5>
                    <table class="min-w-full border border-gray-300 rounded">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left border-b">Nutrisi</th>
                                <th class="px-4 py-2 text-left border-b">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 border-b">Kalori</td>
                                <td class="px-4 py-2 border-b">{{ $konsultasi->kalori }} kcal/hari</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">Protein</td>
                                <td class="px-4 py-2">{{ $konsultasi->protein }} gram/hari</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                {{-- TEKNIK LATIHAN --}}
                <h5 class="text-lg font-semibold mb-2 ">Teknik Latihan</h5>
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
                    <div class="card-header ">
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
