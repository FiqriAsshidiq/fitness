<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 40px;"
        >Panduan Gerakan Latihan</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Form Pencarian -->
            <form method="GET" action="{{ route('member.gerakan') }}" class="mb-6 flex flex-wrap items-center gap-4">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama gerakan..."
                    class="border rounded p-2 w-64"
                >

                <select name="kategori" class="border rounded p-2">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k }}" {{ request('kategori') == $k ? 'selected' : '' }}>
                            {{ ucfirst($k) }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Cari
                </button>
            </form>

            <!-- Daftar Gerakan -->
            <div class="grid gap-6">
                @forelse ($gerakan as $item)
                    <div class="bg-white rounded-xl shadow-md flex overflow-hidden">
                        <!-- GIF -->
                        <div class="w-1/3 p-2 flex items-center justify-center bg-gray-50">
                            @if ($item->gif_url)
                                <img src="{{ asset('storage/' . $item->gif_url) }}" alt="{{ $item->nama_gerakan }}" class="rounded-md w-full h-auto object-contain">
                            @else
                                <span class="text-gray-400 italic">Tidak ada GIF</span>
                            @endif
                        </div>

                        <!-- Info -->
                        <div class="w-2/3 p-4">
                            <h3 class="text-3xl font-bold mb-4">{{ $item->nama_gerakan }}</h3>
                            <p class="text-xl text-gray-900 mb-3"><strong>Target Otot:</strong> {{ $item->target_otot }}</p>
                            <p class="text-2xl text-gray-900 leading-relaxed">
                                {{ $item->deskripsi ?? 'Belum ada deskripsi.' }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Gerakan tidak ditemukan.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
