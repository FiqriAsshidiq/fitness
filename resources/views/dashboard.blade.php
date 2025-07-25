<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 40px;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <br>
     <img src="{{ asset('logologin.png') }}" alt="POS System" class="mx-auto w-25 h-25 object-contain">

    <div class="container mx-auto">
        <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-red-600 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-white">Total Admin</h2>
                <p class="text-3xl text-white">{{ $totalAdmin }}</p>
            </div>
            <div class="bg-red-600 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-white">Total Trainer</h2>
                <p class="text-xl font-semibold text-white">{{ $totalTrainer }}</p>
            </div>
            <div class="bg-red-600 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-white">Total Member</h2>
                <p class="text-xl font-semibold text-white">{{ $totalMember }}</p>
            </div>
        </div>
        
        <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <div class="bg-red-600 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-white">Total Latihan</h2>
                <p class="text-xl font-semibold text-white">{{ $totalLatihan }}</p>
            </div>
            <div class="bg-red-600 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-white">Total Rule</h2>
                <p class="text-xl font-semibold text-white">{{ $totalRule }}</p>
            </div>
            <div class="bg-red-600 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-white">Total Rekomendasi</h2>
                <p class="text-xl font-semibold text-white">{{ $totalRekomendasi }}</p>
            </div>
        </div>
            </div>
</x-app-layout>
