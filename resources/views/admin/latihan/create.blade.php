<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Tambah Teknik Latihan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('admin.latihan.store') }}" method="POST">
                    @csrf


                <div class="mb-4">
                    <label class="block font-semibold">Nama Teknik</label>
                    <input type="text" name="nama_teknik" class="form-control w-full border rounded px-3 py-2"
                        value="{{ old('nama_teknik') }}" required>

                    @error('nama_teknik')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Alat</label>
                    <input type="text" name="alat" class="form-control w-full border rounded px-3 py-2"
                        value="{{ old('alat') }}" required>

                    @error('alat')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Kategori Otot</label>
                    <input type="text" name="kategori_otot" class="form-control w-full border rounded px-3 py-2"
                        value="{{ old('kategori_otot') }}" required>

                    @error('kategori_otot')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                    
                    <div class="flex items-center gap-4">
                        <button class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.latihan') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
