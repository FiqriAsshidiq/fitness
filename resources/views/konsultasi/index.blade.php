<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 30px;">
            {{ __('Form Konsultasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form action="{{ route('konsultasi.proses') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="jenis_kelamin" class="block font-medium">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full border rounded p-2" required>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>

                        <div>
                            <label for="usia" class="block font-medium">Usia</label>
                            <input type="number" name="usia" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label for="berat_badan" class="block font-medium">Berat Badan (kg)</label>
                            <input type="number" name="berat_badan" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label for="tinggi_badan" class="block font-medium">Tinggi Badan (cm)</label>
                            <input type="number" name="tinggi_badan" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label for="aktivitas_fisik_id" class="block font-medium">Aktivitas Fisik</label>
                            <select name="aktivitas_fisik_id" class="w-full border rounded p-2" required>
                                @foreach($aktivitas as $a)
                                    <option value="{{ $a->id }}">{{ $a->tingkat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="pengalaman_id" class="block font-medium">Tingkat Pengalaman</label>
                            <select name="pengalaman_id" class="w-full border rounded p-2" required>
                                @foreach($pengalaman as $p)
                                    <option value="{{ $p->id }}">{{ $p->level }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="tujuan_latihan_id" class="block font-medium">Tujuan Latihan</label>
                            <select name="tujuan_latihan_id" class="w-full border rounded p-2" required>
                                @foreach($tujuanLatihan as $t)
                                    <option value="{{ $t->id }}">{{ $t->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block font-medium mb-2">Target Otot</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                            @foreach($targetOtot as $otot)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="target_otot[]" value="{{ $otot->id }}" class="mr-2">
                                    {{ $otot->fokus }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Proses Konsultasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
