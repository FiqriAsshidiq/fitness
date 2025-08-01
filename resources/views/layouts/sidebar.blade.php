<div class="d-none d-md-block flex-column flex-shrink-0 p-3 text-white" style="width: 280px; background-color: #fffcfc;">
    <!-- Logo -->
    <div class="shrink-0 flex items-center py-8">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <img src="{{ asset('logodashboard2.png') }}" alt="POS System" class="pos-img">
        </a>
    </div>

    <hr>

    <!-- Menu Utama -->
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('dashboard') }}" class="nav-link text-white">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
        </li>

        <!-- Menu Admin -->
        @if (auth()->user()->role_id === 1)
            <li>
                <a href="{{ route('admin.user') }}" class="nav-link text-white">
                    <i class="fas fa-users-cog me-2"></i> Pengguna
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kondisi_tubuh') }}" class="nav-link text-white">
                    <i class="fas fa-heartbeat me-2"></i> Kondisi Tubuh
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pengalaman') }}" class="nav-link text-white">
                    <i class="fas fa-star me-2"></i> Pengalaman
                </a>
            </li>
            <li>
                <a href="{{ route('admin.tujuan') }}" class="nav-link text-white">
                    <i class="fas fa-bullseye me-2"></i> Tujuan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.otot') }}" class="nav-link text-white">
                    <i class="fas fa-hand-rock me-2"></i> Otot
                </a>
            </li>
            <li>
                <a href="{{ route('admin.latihan') }}" class="nav-link text-white">
                    <i class="fas fa-dumbbell me-2"></i> Latihan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.aktivitasfisik.index') }}" class="nav-link text-white">
                    <i class="fas fa-running me-2"></i> Aktivitas Fisik
                </a>
            </li>
            <li>
                <a href="{{ route('admin.gerakan') }}" class="nav-link text-white">
                    <i class="fas fa-person-walking me-2"></i> Gerakan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.rekomendasi') }}" class="nav-link text-white">
                    <i class="fas fa-lightbulb me-2"></i> Rekomendasi
                </a>
            </li>
            <li>
                <a href="{{ route('admin.rule') }}" class="nav-link text-white">
                    <i class="fas fa-cogs me-2"></i> Aturan (Rule)
                </a>
            </li>
            <li>
                <a href="{{ route('admin.nutrisi') }}" class="nav-link text-white">
                    <i class="fas fa-apple-alt me-2"></i> Nutrisi
                </a>
            </li>
            <li>
                <a href="{{ route('admin.saran.index') }}" class="nav-link text-white">
                    <i class="fas fa-notes-medical me-2"></i> Saran
                </a>
            </li>
        @endif
    </ul>

    <hr>

    <!-- User Info & Logout -->
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                {{ Auth::user()->name }}
            </div>
            <div class="font-medium text-sm text-gray-500">
                {{ Auth::user()->email }}
            </div>
        </div>

        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')">
                <i class="fas fa-user me-2"></i> {{ __('Profile') }}
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i> {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</div>
