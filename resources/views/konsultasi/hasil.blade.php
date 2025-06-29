<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 30px;">
            {{ __('Hasil Konsultasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            @if($konsultasi->rekomendasi)
                <div class="mb-6">
                    <h3 class="text-xl font-bold mb-2 text-blue-600">Rekomendasi Latihan</h3>
                    <p><strong>Kode:</strong> {{ $konsultasi->rekomendasi->kode }}</p>
                    <p><strong>Metode Latihan:</strong> {{ $konsultasi->rekomendasi->metode_latihan }}</p>
                    <p><strong>Keterangan:</strong> {{ $konsultasi->rekomendasi->keterangan }}</p>
                </div>

                @if($konsultasi->rekomendasi->latihan && count($konsultasi->rekomendasi->latihan) > 0)
                    <div>
                        <h4 class="text-lg font-semibold mb-2">Daftar Latihan:</h4>
                        <table class="table-auto w-full text-left border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 border">Nama Teknik</th>
                                    <th class="px-4 py-2 border">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($konsultasi->rekomendasi->latihan as $latihan)
                                    <tr>
                                        <td class="px-4 py-2 border">{{ $latihan->nama_teknik }}</td>
                                        <td class="px-4 py-2 border">{{ $latihan->deskripsi }}</td>
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
