<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Edit Gerakan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.gerakan.update', $panduan_gerakan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-semibold">Nama Gerakan</label>
                        <input type="text" name="nama_gerakan" class="form-control w-full border rounded px-3 py-2" value="{{ $panduan_gerakan->nama_gerakan }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Target Otot</label>
                        <input type="text" name="target_otot" class="form-control w-full border rounded px-3 py-2" value="{{ $panduan_gerakan->target_otot }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control w-full border rounded px-3 py-2">{{ $panduan_gerakan->deskripsi }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Ganti GIF (opsional)</label>
                        <input type="file" name="gif_url" class="form-control w-full border rounded px-3 py-2" accept="image/gif">
                        @if($panduan_gerakan->gif_url)
                            <p class="mt-2">GIF saat ini:</p>
                            <img src="{{ asset('storage/' . $panduan_gerakan->gif_url) }}" width="120">
                        @endif
                    </div>

                    <div class="flex items-center gap-4">
                        <button class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.gerakan') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
