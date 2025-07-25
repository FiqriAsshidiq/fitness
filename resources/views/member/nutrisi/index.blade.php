<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 40px;"
        >Panduan Nutrisi</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Form Pencarian & Filter -->
            <form method="GET" action="{{ route('member.nutrisi') }}" class="mb-6 flex flex-wrap items-center gap-4">
                <!-- Input Pencarian -->
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama makanan..."
                    class="border rounded p-2 w-64"
                >

                <!-- Filter Kategori -->
                <select name="kategori" class="border rounded p-2">
                    <option value="">Semua Kategori</option>
                    @foreach ($daftarKategori as $k)
                        <option value="{{ $k }}" {{ request('kategori') == $k ? 'selected' : '' }}>
                            {{ ucfirst($k) }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Cari
                </button>
            </form>

            <!-- Daftar Nutrisi -->
            <div class="grid gap-6">
                @forelse ($nutrisi as $item)
                    <div class="bg-white rounded-xl shadow-md flex overflow-hidden">
                        {{-- Gambar makanan --}}
                        <div class="w-1/3 p-2 flex items-center justify-center">
                            @if ($item->gambar_url)
                                <img src="{{ asset('storage/' . $item->gambar_url) }}" alt="Gambar Makanan" class="rounded-md w-full h-auto object-cover">
                            @else
                                <span class="text-gray-400 italic">Tidak ada gambar</span>
                            @endif
                        </div>

                        {{-- Info nutrisi --}}
                        <div class="w-2/3 p-4">
                            <h3 class="text-2xl font-bold mb-2">{{ $item->nama_makanan }}</h3>
                            <p class="text-lg text-gray-700"><strong>Kategori:</strong> {{ $item->kategori }}</p>
                            <p class="text-lg text-gray-700 mt-1"><strong>Energi:</strong> {{ $item->energi ?? '-' }} kkal</p>
                            <p class="text-lg text-gray-700 mt-1"><strong>Protein:</strong> {{ $item->protein ?? '-' }} gram</p>
                            <p class="text-lg text-gray-700 mt-1"><strong>Lemak:</strong> {{ $item->lemak ?? '-' }} gram</p>
                            <p class="text-lg text-gray-700 mt-1"><strong>Serat:</strong> {{ $item->serat ?? '-' }} gram</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada data panduan nutrisi tersedia.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
