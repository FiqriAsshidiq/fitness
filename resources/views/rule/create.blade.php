<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 40px;">
            {{ __('Tambah Aturan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('rule.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="target_otot">Pilih Target Otot:</label>
                        <div class="row">
                            @foreach($targetOtot as $otot)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="target_otot[]" value="{{ $otot->id }}" id="otot{{ $otot->id }}">
                                        <label class="form-check-label" for="otot{{ $otot->id }}">
                                            {{ $otot->kode }} - {{ $otot->fokus }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('rule') }}" class="btn btn-secondary">Kembali</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
