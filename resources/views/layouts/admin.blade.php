<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard Admin')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

    <!-- ================= SIDEBAR ================= -->
    <aside class="w-64 bg-blue-900 text-white flex flex-col fixed inset-y-0">

        <!-- Logo -->
        <div class="px-6 py-5 border-b border-blue-800 text-center">
            <img src="{{ asset('logo.png') }}" class="h-14 mx-auto mb-2">
            <h3 class="text-sm font-semibold leading-tight">
                Direktorat Pelindungan PMI
            </h3>
            <p class="text-xs text-blue-200">
                Kementerian P2MI
            </p>
        </div>

        <!-- Menu -->
        <nav class="flex-1 px-4 py-6 space-y-2 text-sm">

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-blue-800 transition">

                <!-- ICON DASHBOARD -->
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 13h8V3H3v10zm10 8h8V3h-8v18z"/>
                </svg>

                Dashboard
            </a>

            <!-- List Pengaduan -->
            <a href="{{ route('admin.pengaduan.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-blue-800 transition">

                <!-- ICON DOCUMENT -->
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-6 4h6M7 4h8l4 4v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                </svg>

                List Pengaduan
            </a>
        </nav>

        <!-- Logout -->
        <div class="p-4 border-t border-blue-800">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="w-full bg-red-600 hover:bg-red-700 transition py-2 rounded-md text-sm font-semibold">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- ================= MAIN ================= -->
    <div class="flex-1 ml-64 flex flex-col min-h-screen">

        <!-- ================= HEADER ================= -->
        <header class="h-16 bg-white border-b flex items-center justify-between px-6 fixed top-0 left-64 right-0 z-20">

            

            <!-- PROFILE -->
            <div class="flex items-center gap-3 ml-auto">
                <div class="text-right">
                    <div class="text-sm font-semibold">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="text-xs text-gray-500">
                        Admin
                    </div>
                </div>

                <div class="w-9 h-9 rounded-full bg-blue-900 text-white flex items-center justify-center font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>
        </header>

        <!-- ================= CONTENT ================= -->
        <main class="flex-1 pt-20 pb-24 px-6">
            @yield('content')
        </main>

        <!-- ================= FOOTER ================= -->
        <footer class="h-14 bg-white border-t text-xs text-gray-500 flex items-center justify-center fixed bottom-0 left-64 right-0">
            © {{ date('Y') }} KP2MI — Direktorat Pelindungan PMI
        </footer>

    </div>
</div>

</body>
</html>
