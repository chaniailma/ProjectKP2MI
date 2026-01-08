<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'KP2MI')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col">

{{-- ================= HEADER (STICKY) ================= --}}
<header class="sticky top-0 z-50 bg-blue-900 shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <div class="flex items-center gap-3">
            <img src="{{ asset('images/kp2mi-logo.png') }}"
                 class="w-11"
                 alt="KP2MI">

            <span class="font-semibold text-sm lg:text-base text-yellow-400 leading-tight">
                Direktorat Layanan Pengaduan, Mediasi,<br class="hidden lg:block">
                dan Advokasi PMI
            </span>
        </div>

        <nav class="flex gap-3">
            @guest
                <a href="{{ route('login') }}"
                   class="px-4 py-2 border border-yellow-400 text-yellow-400 rounded
                          hover:bg-yellow-400 hover:text-blue-900 transition">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="px-4 py-2 bg-yellow-400 text-blue-900 rounded font-semibold
                          hover:bg-yellow-300 transition">
                    Daftar
                </a>
            @else
                <a href="{{ route('admin.dashboard') }}"
                   class="px-4 py-2 bg-yellow-400 text-blue-900 rounded font-semibold">
                    Dashboard
                </a>
            @endguest
        </nav>

    </div>

    {{-- STRIP KUNING --}}
    <div class="h-2 bg-yellow-400"></div>
</header>

{{-- ================= MAIN ================= --}}
<main class="flex-1 pt-6 pb-16">
    @yield('content')
</main>

{{-- ================= FOOTER (STICKY) ================= --}}
<footer class="sticky bottom-0 z-40 bg-blue-900 text-yellow-400">
    <div class="max-w-7xl mx-auto px-6 py-3 text-center text-sm font-medium">
        © {{ date('Y') }} KP2MI — Sistem Pengaduan Pekerja Migran Indonesia
    </div>
</footer>

</body>
</html>
