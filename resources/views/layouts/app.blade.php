<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Add Custom Styles -->
        <style>
            .nav-pills li a {
                color: black !important; /* Warna hitam */
                text-decoration: none; /* Menghilangkan underline */
            }

            .nav-pills li:hover a {
                background-color: #e90e0e !important; /* Warna latar saat hover */
                color: white !important; /* Warna teks saat hover */
            }
            body {
            font-family: 'Poppins', sans-serif;
            }

            .nav-pills li {
                font-size: 25px; 
                font-family: 'Poppins', sans-serif;
                margin: 6px 0;
                
            }

        </style>
    </head>
        <body class="font-sans antialiased">
            <div class="min-h-screen d-flex">
                <div class="d-none d-md-block flex-column flex-shrink-0 p-3 text-white" style="width: 280px; background-color: #fffcfc;">
                    <div class="shrink-0 flex items-center py-8">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                        <img src="{{ asset('logodashboard2.png') }}" alt="POS System" class="pos-img">
                    </a>
                </div>
                <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <!-- Dashboard -->
                        <li>
                            <a href="{{ route('dashboard') }}" class="nav-link text-white">
                                <i class="fas fa-home me-2"></i> Dashboard
                            </a>
                        </li>

                        <!-- Admin -->
                        @if (auth()->user()->role_id === 1)
                            <li>
                                <a href="{{ route('admin.user') }}" class="nav-link text-white">
                                    <i class="fas fa-users-cog me-2"></i> Manajemen User
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.latihan') }}" class="nav-link text-white">
                                    <i class="fas fa-dumbbell me-2"></i> Latihan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.kondisi_tubuh') }}" class="nav-link text-white">
                                    <i class="fas fa-heartbeat me-2"></i> Kondisi
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
                                <a href="{{ route('admin.nutrisi') }}" class="nav-link text-white">
                                    <i class="fas fa-apple-alt me-2"></i> Nutrisi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.saran.index') }}" class="nav-link text-white">
                                    <i class="fas fa-notes-medical me-2"></i> Saran
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
                        @endif

                        <!-- Member -->
                        @if (auth()->user()->role_id === 3)
                            <li>
                                <a href="{{ route('member.konsultasi') }}" class="nav-link text-white">
                                    <i class="fas fa-comments me-2"></i> Konsultasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('member.hasil.saya') }}" class="nav-link text-white">
                                    <i class="fas fa-chart-line me-2"></i> Hasil Rekomendasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('member.gerakan') }}" class="nav-link text-white">
                                    <i class="fas fa-person-walking me-2"></i> Gerakan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('member.nutrisi') }}" class="nav-link text-white">
                                    <i class="fas fa-apple-alt me-2"></i> Nutrisi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('member.saran.create') }}" class="nav-link text-white">
                                    <i class="fas fa-notes-medical me-2"></i> Saran
                                </a>
                            </li>
                        @endif
                    </ul>
                <hr>
                <!-- Dropdown User Menu -->
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
                        <!-- Profile Link -->
                        <x-responsive-nav-link :href="route('profile.edit')">
                            <i class="fas fa-user me-2"></i> {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i> {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
             </div>

            <div class="flex-grow-1">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                <header style="background-color: #e90e0e;">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            
                <!-- Page Content -->
            <main class="bg-white">
                        {{ $slot }}

                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
