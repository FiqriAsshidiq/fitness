<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Tambah Gerakan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('admin.gerakan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-semibold">Nama Gerakan</label>
                        <input type="text" name="nama_gerakan" class="form-control w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Target Otot</label>
                        <input type="text" name="target_otot" class="form-control w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control w-full border rounded px-3 py-2" rows="4"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Upload GIF</label>
                        <input type="file" name="gif_url" class="form-control w-full border rounded px-3 py-2" accept="image/gif">
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.gerakan') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
