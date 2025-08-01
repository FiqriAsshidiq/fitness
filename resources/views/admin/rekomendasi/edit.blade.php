<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 40px;">
            {{ ('Edit Rekomendasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-sm">
                <form action="{{ route('admin.rekomendasi.update', $rekomendasi->id) }}" method="POST">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label for="rule_id" class="form-label">Pilih Aturan</label>
                        <select name="rule_id" class="form-control" required>
                            @foreach ($rules as $rule)
                                <option value="{{ $rule->id }}" {{ $rekomendasi->rule_id == $rule->id ? 'selected' : '' }}>
                                    Rule #{{ $rule->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pilih Latihan</label>
                        <div class="row">
                            @foreach ($latihan as $item)
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="latihan_id[]" value="{{ $item->id }}"
                                            {{ $rekomendasi->latihan->contains($item->id) ? 'checked' : '' }}>
                                        {{ $item->kode }} - {{ $item->nama_teknik }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="metode_latihan" class="form-label">Metode Latihan</label>
                        <input type="text" name="metode_latihan" class="form-control" value="{{ $rekomendasi->metode_latihan }}">
                    </div>

                    <div class="mb-3">
                        <label for="nutrisi" class="form-label">Nutrisi</label>
                        <textarea name="nutrisi" class="form-control">{{ old('nutrisi') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea name="catatan" class="form-control">{{ old('catatan') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.rekomendasi') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
