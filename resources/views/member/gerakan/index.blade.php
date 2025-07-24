<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 leading-tight">Panduan Nutrisi</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-6">

            @foreach ($nutrisi as $item)
                <div class="bg-white rounded-xl shadow-md flex overflow-hidden">
                    
                    {{-- Gambar makanan di kiri --}}
                    <div class="w-1/3 p-2 flex items-center justify-center">
                        @if ($item->gambar_url)
                            <img src="{{ asset('storage/' . $item->gambar_url) }}" alt="Gambar Makanan" class="rounded-md w-full h-auto object-cover">
                        @else
                            <span class="text-gray-400 italic">Tidak ada gambar</span>
                        @endif
                    </div>

                    {{-- Info nutrisi di kanan --}}
                    <div class="w-2/3 p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $item->nama_makanan }}</h3>
                        <p class="text-sm text-gray-700"><strong>Kategori:</strong> {{ $item->kategori }}</p>
                        <p class="text-sm text-gray-700 mt-1">
                            <strong>Kalori:</strong> {{ $item->kalori ?? '-' }} kkal
                        </p>
                        <p class="text-sm text-gray-700 mt-1">
                            <strong>Protein:</strong> {{ $item->protein ?? '-' }} gram
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
