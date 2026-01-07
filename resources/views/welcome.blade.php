<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Pengaduan PMI | KP2MI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

{{-- ================= ALERT SUCCESS ================= --}}
@if (session('success'))
    <div id="success-alert"
         class="fixed top-5 left-1/2 -translate-x-1/2 z-50
                bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg
                flex items-center gap-3 transition-opacity duration-500">
        <span class="text-xl">✅</span>
        <span class="font-medium">{{ session('success') }}</span>
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('success-alert');
            if (alert) {
                alert.classList.add('opacity-0');
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);
    </script>
@endif

{{-- ================= HEADER PUBLIK ================= --}}
<header class="bg-blue-700 shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        {{-- LOGO & TITLE --}}
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/kp2mi-logo.png') }}" class="w-12" alt="KP2MI">
            <span class="font-semibold text-sm lg:text-base text-white leading-tight">
                Direktorat Layanan Pengaduan, Mediasi,<br class="hidden lg:block">
                dan Advokasi PMI
            </span>
        </div>

        {{-- AUTH BUTTON --}}
        <nav class="flex gap-3">
    @if (Auth::check())
        <a href="{{ route('admin.dashboard') }}"
           class="px-4 py-2 bg-yellow-400 text-blue-900 rounded">
            Dashboard
        </a>
    @else
        <a href="{{ route('login') }}"
           class="px-4 py-2 border border-yellow-400 text-yellow-400 rounded">
            Login
        </a>

        <a href="{{ route('register') }}"
           class="px-4 py-2 bg-yellow-400 text-blue-900 rounded">
            Daftar
        </a>
    @endif
</nav>


    </div>
</header>

{{-- ================= MAIN ================= --}}
<main class="flex-1 flex items-center">
    <div class="max-w-7xl mx-auto px-6 py-20
                grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        {{-- TEXT --}}
        <div>
            <h1 class="text-3xl lg:text-4xl font-bold mb-4 text-blue-900">
                Sistem Pengaduan<br>Pekerja Migran Indonesia
            </h1>

            <p class="text-gray-600 mb-8 leading-relaxed">
                Platform resmi <strong class="text-blue-900">KP2MI</strong>
                untuk menerima, memproses, dan memantau pengaduan
                Pekerja Migran Indonesia secara aman, transparan,
                dan terintegrasi.
            </p>

            <a href="{{ route('pengaduan.create') }}"
               class="inline-block px-6 py-3 bg-blue-900 text-white rounded
                      hover:bg-blue-800 transition">
                Daftar Pengaduan
            </a>
        </div>

        {{-- IMAGE --}}
        <div class="hidden lg:flex justify-center">
            <img src="{{ asset('images/BP2MI.png') }}"
                 alt="PMI"
                 class="max-w-md w-full h-auto">
        </div>

    </div>
</main>

{{-- ================= FOOTER ================= --}}
<footer class="bg-blue-900 text-yellow-400">
    <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm">
        © {{ date('Y') }} KP2MI — Sistem Pengaduan Pekerja Migran Indonesia
    </div>
</footer>

</body>
</html>
