<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Nama -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Telephone -->
        <div class="mt-4">
            <x-input-label for="telphone" :value="__('telphone')" />
            <x-text-input id="telphone" class="block mt-1 w-full" type="telphone" name="telphone" :value="old('telphone')" required />
            <x-input-error :messages="$errors->get('telphone')" class="mt-2" />
        </div>

        <!-- Jenis Kelamin -->
        <div class="mt-4">
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <select name="jenis_kelamin" id="jenis_kelamin" class="block w-full border rounded p-2">
                <option value="">Pilih</option>
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
            </select>
            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
        </div>

        <!-- Usia -->
        <div class="mt-4">
            <x-input-label for="usia" :value="__('Usia (tahun)')" />
            <x-text-input id="usia" class="block mt-1 w-full" type="number" name="usia" :value="old('usia')" required />
            <x-input-error :messages="$errors->get('usia')" class="mt-2" />
        </div>

        <!-- Tinggi Badan -->
        <div class="mt-4">
            <x-input-label for="tinggi_badan" :value="__('Tinggi Badan (cm)')" />
            <x-text-input id="tinggi_badan" class="block mt-1 w-full" type="number" name="tinggi_badan" :value="old('tinggi_badan')" required />
            <x-input-error :messages="$errors->get('tinggi_badan')" class="mt-2" />
        </div>

        <!-- Berat Badan -->
        <div class="mt-4">
            <x-input-label for="berat_badan" :value="__('Berat Badan (kg)')" />
            <x-text-input id="berat_badan" class="block mt-1 w-full" type="number" name="berat_badan" :value="old('berat_badan')" required />
            <x-input-error :messages="$errors->get('berat_badan')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Konfirmasi Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Foto Member -->
        <div class="mt-4">
            <x-input-label for="foto_member" :value="__('Upload Foto Kartu Member')" />
            <input id="foto_member" type="file" name="foto_member" class="block mt-1 w-full border rounded p-2">
            <x-input-error :messages="$errors->get('foto_member')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
