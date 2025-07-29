<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Edit Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-5 px-2">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg">
                <hr><br>

                <div>
                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" value="{{ $user->name }}" readonly
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100">
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <input type="text" value="{{ ucfirst($user->jenis_kelamin) }}" readonly
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100">
                    </div>

                    <!-- Usia -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Usia</label>
                        <input type="text" value="{{ $user->usia }} tahun" readonly
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100">
                    </div>

                    <!-- Berat Badan -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Berat Badan</label>
                        <input type="text" value="{{ $user->berat_badan }} kg" readonly
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100">
                    </div>

                    <!-- Tinggi Badan -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tinggi Badan</label>
                        <input type="text" value="{{ $user->tinggi_badan }} cm" readonly
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100">
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" value="{{ $user->email }}" readonly
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100">
                    </div>

                    <!-- Telphone -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Telphone</label>
                        <input type="text" value="{{ $user->telphone }}" readonly
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100">
                    </div>

                    <!-- Tombol -->
                    <div class="flex items-center gap-4">            
                        <form action="{{ route('admin.user.resetPassword', $user->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin mereset password user ini ke default?')">
                            @csrf
                            @method('PUT')
                            <x-primary-button class="bg-yellow-400">Reset Password</x-primary-button>
                        <a href="{{ route('admin.user') }}" class="btn btn-secondary">Batal</a>                                 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
