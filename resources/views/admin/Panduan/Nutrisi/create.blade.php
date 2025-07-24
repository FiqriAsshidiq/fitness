<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Tambah Panduan Nutrisi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('admin.nutrisi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-semibold">Nama Makanan</label>
                        <input type="text" name="nama_makanan" class="form-control w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Kategori</label>
                        <input type="text" name="kategori" class="form-control w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Kalori (kkal)</label>
                        <input type="number" step="0.01" name="kalori" class="form-control w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Protein (gram)</label>
                        <input type="number" step="0.01" name="protein" class="form-control w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Upload Gambar</label>
                        <input type="file" name="gambar_url" class="form-control w-full border rounded px-3 py-2" accept="image/*">
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.nutrisi') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
