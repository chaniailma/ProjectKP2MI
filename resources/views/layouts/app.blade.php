<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-blue-900 text-white p-4">
        <h2 class="text-lg font-bold mb-6">Admin Panel</h2>

        <nav class="space-y-3">
            <a href="{{ route('admin.dashboard') }}" class="block hover:bg-blue-700 p-2 rounded">
                Dashboard
            </a>

            <a href="{{ route('admin.pengaduan.index') }}" class="block hover:bg-blue-700 p-2 rounded">
                List Pengaduan
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left hover:bg-red-600 p-2 rounded">
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>
</body>
</html>
