<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 30px;">
            {{ __('Konsultasi Latihan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 bg-white rounded shadow p-6">
            <form method="POST" action="{{ route('konsultasi.proses') }}">
                @csrf
            <!-- Jenis Kelamin -->
                <div class="mb-4">
                    <label class="block font-semibold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select w-full" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                    </select>
                </div>

                <!-- Berat Badan -->
                <div class="mb-4">
                    <label class="block font-semibold">Berat Badan (kg)</label>
                    <input type="number" step="0.1" name="berat_badan" class="form-input w-full" required>
                </div>

                <!-- Tinggi Badan -->
                <div class="mb-4">
                    <label class="block font-semibold">Tinggi Badan (cm)</label>
                    <input type="number" step="0.1" name="tinggi_badan" class="form-input w-full" required>
                </div>

                <!-- Usia -->
                <div class="mb-4">
                    <label class="block font-semibold">Usia</label>
                    <input type="number" name="usia" class="form-input w-full" required>
                </div>

                <!-- Aktivitas Fisik -->
                <div class="mb-4">
                    <label class="block font-semibold">Aktivitas Fisik</label>
                    <select name="aktivitas_fisik_id" class="form-select w-full" required>
                        <option value="">-- Pilih Aktivitas --</option>
                        @foreach($aktivitas as $a)
                            <option value="{{ $a->id }}">{{ $a->tingkat }} ({{ $a->nilai }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="font-semibold">Pilih Pengalaman:</label>
                    <select name="pengalaman_id" class="block mt-1 w-full border rounded p-2">
                        <option value="">-- Pilih Tingkat Pengalaman --</option>
                        @foreach($pengalaman as $item)
                            <option value="{{ $item->id }}">{{ $item->level }}</option>
                        @endforeach
                    </select>
                    @error('pengalaman_id')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Input Tujuan Latihan -->
                <div class="mb-4">
                    <label for="tujuan_latihan_id" class="block text-gray-700 font-semibold mb-2">Tujuan Latihan</label>
                    <select name="tujuan_latihan_id" id="tujuan_latihan_id" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih Tujuan Latihan --</option>
                        @foreach($tujuanLatihan as $tujuan)
                            <option value="{{ $tujuan->id }}">{{ $tujuan->nama }}</option>
                        @endforeach
                    </select>
                    @error('tujuan_latihan_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="font-semibold">Pilih Target Otot:</label>
                    <div class="grid grid-cols-1 gap-2 mt-2">
                        @foreach($targetOtot as $otot)
                            <div class="flex items-center">
                                <input type="checkbox" name="target_otot[]" value="{{ $otot->id }}" id="otot{{ $otot->id }}" class="mr-2">
                                <label for="otot{{ $otot->id }}">{{ $otot->kode }} - {{ $otot->fokus }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <x-primary-button class="mt-4">{{ __('Proses Konsultasi') }}</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
