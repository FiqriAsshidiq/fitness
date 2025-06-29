<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 30px;">
            {{ __('Konsultasi Latihan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white rounded shadow p-6">
            <form method="POST" action="{{ route('konsultasi.proses') }}">
                @csrf

                <div class="mb-4">
                    <label class="font-semibold">Pilih Target Otot:</label>
                    <div class="flex flex-col space-y-2 mt-2">
                        @foreach($targetOtot as $otot)
                            <div class="flex items-center">
                                <input type="checkbox" name="target_otot[]" value="{{ $otot->id }}" id="otot{{ $otot->id }}" class="mr-2">
                                <label for="otot{{ $otot->id }}">{{ $otot->kode }} - {{ $otot->fokus }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <x-primary-button>{{ __('Proses Konsultasi') }}</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
