<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Edit Aktivitas Fisik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('admin.aktivitasfisik.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-semibold">Tingkat</label>
                        <input type="text" name="tingkat" value="{{ $item->tingkat }}" class="form-control w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Nilai</label>
                        <input type="number" name="nilai" value="{{ $item->nilai }}" step="0.1" class="form-control w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="flex items-center gap-4">
                        <button class="btn btn-success">Perbarui</button>
                        <a href="{{ route('admin.aktivitasfisik.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
