<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Edit Panduan Nutrisi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('admin.nutrisi.update', $panduan_nutrisi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-semibold">Nama Makanan</label>
                        <input type="text" name="nama_makanan" class="form-control w-full border rounded px-3 py-2" value="{{ $panduan_nutrisi->nama_makanan }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Kategori</label>
                        <input type="text" name="kategori" class="form-control w-full border rounded px-3 py-2" value="{{ $panduan_nutrisi->kategori }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Kalori (kkal)</label>
                        <input type="number" step="0.01" name="kalori" class="form-control w-full border rounded px-3 py-2" value="{{ $panduan_nutrisi->kalori }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Protein (gram)</label>
                        <input type="number" step="0.01" name="protein" class="form-control w-full border rounded px-3 py-2" value="{{ $panduan_nutrisi->protein }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Gambar Saat Ini</label><br>
                        @if($panduan_nutrisi->gambar_url)
                            <img src="{{ asset('storage/' . $panduan_nutrisi->gambar_url) }}" width="120">
                        @else
                            <em>Tidak ada gambar</em>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Upload Gambar Baru</label>
                        <input type="file" name="gambar_url" class="form-control w-full border rounded px-3 py-2" accept="image/*">
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('admin.nutrisi') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
