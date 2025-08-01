<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white leading-tight" style="font-size: 30px;">
            {{ __('Tambah Aturan') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('admin.rule.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-semibold">Tingkat Pengalaman</label>
                    <select name="pengalaman_id" class="form-select w-full" required>
                        <option value="">-- Pilih Pengalaman --</option>
                        @foreach($pengalaman as $item)
                            <option value="{{ $item->id }}" {{ old('pengalaman_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->level }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Tujuan Latihan</label>
                    <select name="tujuan_latihan_id" class="form-select w-full" required>
                        <option value="">-- Pilih Tujuan --</option>
                        @foreach($tujuan as $item)
                            <option value="{{ $item->id }}" {{ old('tujuan_latihan_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Kondisi Tubuh</label>
                    <select name="kondisi_tubuh_id" class="form-select w-full" required>
                        <option value="">-- Pilih Kondisi --</option>
                        @foreach($kondisiTubuh as $item)
                            <option value="{{ $item->id }}" {{ old('kondisi_tubuh_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->Kondisi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">Target Otot</label>
                    <div class="grid grid-cols-1 gap-2">
                        @foreach($targetOtot as $otot)
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="target_otot[]" value="{{ $otot->id }}" class="mr-2"
                                    {{ in_array($otot->id, old('target_otot', [])) ? 'checked' : '' }}>
                                {{ $otot->kode }} - {{ $otot->fokus }}
                            </label>
                        @endforeach
                    </div>
                </div>
                <x-primary-button>Simpan</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>


