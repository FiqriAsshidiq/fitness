<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 30px;">
            {{ __('Hasil Konsultasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">

            {{-- ✅ Jika ada rekomendasi --}}
            @if($konsultasi->rekomendasi)

                {{-- Informasi umum --}}
                <div class="mb-6">
                    <p><strong>Pengalaman:</strong> {{ $konsultasi->pengalaman->tingkat ?? '-' }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ ucfirst($konsultasi->jenis_kelamin) }}</p>
                    <p><strong>Usia:</strong> {{ $konsultasi->usia }} tahun</p>
                    <p><strong>Berat Badan:</strong> {{ $konsultasi->berat_badan }} kg</p>
                    <p><strong>Tinggi Badan:</strong> {{ $konsultasi->tinggi_badan }} cm</p>

                    <h3 class="text-xl font-bold mb-2 text-blue-600 mt-4">Rekomendasi Latihan</h3>
                    <p><strong>Target Otot:</strong> 
                        @foreach($konsultasi->targetOtot as $otot)
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">{{ $otot->fokus }}</span>
                        @endforeach
                    </p>
                    <p><strong>Kode:</strong> {{ $konsultasi->rekomendasi->kode }}</p>
                    <p><strong>Metode Latihan:</strong> {{ $konsultasi->rekomendasi->metode_latihan }}</p>
                    <p><strong>Keterangan:</strong> {{ $konsultasi->rekomendasi->keterangan }}</p>
                </div>

                {{-- ✅ Perhitungan Energi --}}
                @if(isset($bmr) && isset($tdee))
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-green-600 mb-2">Perhitungan Energi</h3>
                        <p><strong>BMR:</strong> {{ number_format($bmr, 2) }} kkal</p>
                        <p><strong>TDEE:</strong> {{ number_format($tdee, 2) }} kkal</p>
                    </div>
                @endif

                {{-- ✅ Rekomendasi Kalori dan Protein --}}
                @if($tdee && $konsultasi->rekomendasi->tujuanLatihan)
                    @php
                        $tujuan = strtolower($konsultasi->rekomendasi->tujuanLatihan->nama);
                        $bb = $konsultasi->berat_badan;
                        $kalori = 0;
                        $protein = '';

                        switch ($tujuan) {
                            case 'fat loss':
                                $kalori = $tdee * 0.90;
                                $protein = $bb * 2.2 . ' - ' . $bb * 3.0 . ' gram';
                                break;
                            case 'bodybuilding':
                                $kalori = $tdee * 1.10;
                                $protein = $bb * 1.4 . ' - ' . $bb * 2.0 . ' gram';
                                break;
                            case 'maintenance':
                                $kalori = $tdee;
                                $protein = $bb * 1.2 . ' - ' . $bb * 1.8 . ' gram';
                                break;
                        }
                    @endphp

                    <div class="mt-8 bg-green-50 p-4 rounded shadow">
                        <h4 class="text-lg font-semibold text-green-700 mb-2">Rekomendasi Nutrisi</h4>
                        <p><strong>Tujuan Latihan:</strong> {{ ucfirst($tujuan) }}</p>
                        <p><strong>Kalori Harian:</strong> {{ number_format($kalori, 2) }} kkal</p>
                        <p><strong>Protein Harian:</strong> {{ $protein }}</p>
                        <p class="text-sm text-gray-600 mt-1 italic">
                            * Perhitungan berdasarkan berat badan Anda: {{ $bb }} kg
                        </p>
                    </div>
                @endif

                {{-- ✅ Teknik Latihan --}}
                @if($konsultasi->rekomendasi->latihan && count($konsultasi->rekomendasi->latihan) > 0)
                    <div class="mt-6">
                        <h4 class="text-lg font-semibold mb-2">Daftar Teknik Latihan:</h4>
                        <table class="table-auto w-full text-left border border-gray-200">
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
                    </div>
                @else
                    <p class="text-gray-600 mt-4">Belum ada teknik latihan terhubung dengan rekomendasi ini.</p>
                @endif

            @else
                <div class="alert alert-warning text-red-700 bg-yellow-100 border border-yellow-300 p-4 rounded">
                    Tidak ditemukan rekomendasi berdasarkan kombinasi otot yang Anda pilih.
                </div>
            @endif

            <div class="mt-6">
                <a href="{{ route('konsultasi.index') }}" class="btn btn-secondary bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">
                    ← Kembali ke Konsultasi
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
