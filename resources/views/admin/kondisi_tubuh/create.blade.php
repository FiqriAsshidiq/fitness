<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Tambah Kondisi Tubuh') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('admin.kondisi_tubuh.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-semibold">Nama Kondisi</label>
                        <input type="text" name="kondisi" class="form-control w-full border rounded px-3 py-2"
                            value="{{ old('kondisi') }}" required>

                        @error('kondisi')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <button class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.kondisi_tubuh') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
