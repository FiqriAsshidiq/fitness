<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight text-center" style="font-size: 40px;"
        >Kirim Saran</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Tampilkan pesan sukses --}}
            @if(session('success'))
                <div class="text-green-600 bg-green-100 px-4 py-2 rounded mb-4 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white p-6 rounded shadow text-center">
                
                {{-- Logo di atas --}}
                <img src="{{ asset('logologin.png') }}" alt="POS System" class="mx-auto w-20 h-20 object-contain">

                {{-- Judul --}}
                <h2 class="text-xl font-semibold mb-6 text-center">Masukkan Saran Anda:</h2>

                {{-- Form --}}
                <form action="{{ route('member.saran.store') }}" method="POST">
                    @csrf

                    <div class="mb-4 text-left">
                        <label for="keterangan" class="block font-semibold mb-2"></label>
                        <textarea name="keterangan" id="keterangan" rows="4"
                            class="w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200"
                            required>{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
