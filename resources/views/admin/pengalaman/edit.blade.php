<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 40px;">
            {{ __('Edit Tingkat Pengalaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.pengalaman.update', $pengalaman->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="kode" class="block font-medium">Kode</label>
                        <input type="text" name="kode" id="kode" class="form-input w-full" required value="{{ old('kode', $pengalaman->kode) }}">
                        @error('kode') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="level" class="block font-medium">Level</label>
                        <input type="text" name="level" id="level" class="form-input w-full" required value="{{ old('level', $pengalaman->level) }}">
                        @error('level') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="block font-medium">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-textarea w-full" required>{{ old('deskripsi', $pengalaman->deskripsi) }}</textarea>
                        @error('deskripsi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.pengalaman') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
