<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Edit Panduan Nutrisi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.nutrisi.update', $nutrisi->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama_makanan">Nama Makanan</label>
                        <input type="text" name="nama_makanan" value="{{ $nutrisi->nama_makanan }}" class="form-input w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori" value="{{ $nutrisi->kategori }}" class="form-input w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="energi">Energi (kkal)</label>
                        <input type="number" name="energi" step="0.01" value="{{ $nutrisi->energi }}" class="form-input w-full">
                    </div>

                    <div class="mb-4">
                        <label for="protein">Protein (g)</label>
                        <input type="number" name="protein" step="0.01" value="{{ $nutrisi->protein }}" class="form-input w-full">
                    </div>

                    <div class="mb-4">
                        <label for="lemak">Lemak (g)</label>
                        <input type="number" name="lemak" step="0.01" value="{{ $nutrisi->lemak }}" class="form-input w-full">
                    </div>

                    <div class="mb-4">
                        <label for="serat">Serat (g)</label>
                        <input type="number" name="serat" step="0.01" value="{{ $nutrisi->serat }}" class="form-input w-full">
                    </div>

                    <div class="mb-4">
                        <label for="gambar_url">Ganti Gambar</label>
                        <input type="file" name="gambar_url" class="form-input w-full">
                        @if($nutrisi->gambar_url)
                            <img src="{{ asset('storage/' . $nutrisi->gambar_url) }}" width="100" class="mt-2">
                        @endif
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
