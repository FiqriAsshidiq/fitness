<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Nama -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Usia -->
        <div>
            <x-input-label for="usia" :value="__('Usia')" />
            <x-text-input id="usia" name="usia" type="number" class="mt-1 block w-full"
                :value="old('usia', $user->usia)" min="0" />
            <x-input-error class="mt-2" :messages="$errors->get('usia')" />
        </div>

        <!-- Berat Badan -->
        <div>
            <x-input-label for="berat_badan" :value="__('Berat Badan (kg)')" />
            <x-text-input id="berat_badan" name="berat_badan" type="number" step="0.1" class="mt-1 block w-full"
                :value="old('berat_badan', $user->berat_badan)" min="0" />
            <x-input-error class="mt-2" :messages="$errors->get('berat_badan')" />
        </div>

        <!-- Tinggi Badan -->
        <div>
            <x-input-label for="tinggi_badan" :value="__('Tinggi Badan (cm)')" />
            <x-text-input id="tinggi_badan" name="tinggi_badan" type="number" step="0.1" class="mt-1 block w-full"
                :value="old('tinggi_badan', $user->tinggi_badan)" min="0" />
            <x-input-error class="mt-2" :messages="$errors->get('tinggi_badan')" />
        </div>

        <!-- Tombol Simpan -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
