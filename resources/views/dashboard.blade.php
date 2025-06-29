<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight" style="font-size: 40px;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <br>
    <div class="container mx-auto p-6">
        <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-blue-100 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-gray-800">Total Admin</h2>
                <p class="text-3xl">{{ $totalAdmin }}</p>
            </div>
            <div class="bg-green-100 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-gray-800">Total Trainer</h2>
                <p class="text-3xl">{{ $totalTrainer }}</p>
            </div>
            <div class="bg-yellow-100 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-gray-800">Total Member</h2>
                <p class="text-3xl">{{ $totalMember }}</p>
            </div>
        </div>
        
        <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <div class="bg-purple-100 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-gray-800">Total Latihan</h2>
                <p class="text-3xl">{{ $totalLatihan }}</p>
            </div>
            <div class="bg-pink-100 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-gray-800">Total Rule</h2>
                <p class="text-3xl">{{ $totalRule }}</p>
            </div>
            <div class="bg-red-100 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-gray-800">Total Rekomendasi</h2>
                <p class="text-3xl">{{ $totalRekomendasi }}</p>
            </div>
        </div>
            </div>
</x-app-layout>
