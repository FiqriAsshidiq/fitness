<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 40px;">
            {{ __('Edit Target Otot') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('admin.otot.update', $targetOtot->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-semibold">Fokus</label>
                        <input type="text" name="fokus" value="{{ old('fokus', $targetOtot->fokus) }}" class="form-control w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="flex items-center gap-4">
                        <button class="btn btn-success">Update</button>
                        <a href="{{ route('admin.otot') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
