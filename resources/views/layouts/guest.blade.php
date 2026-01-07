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

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-100">

    <div class="min-h-screen flex flex-col justify-center items-center px-4">

        <!-- LOGO -->
        <div class="mb-6">
            <a href="{{ url('/') }}">
                <x-application-logo class="w-20 h-20 fill-current text-gray-600" />
            </a>
        </div>

        <!-- CARD -->
        <div class="w-full sm:max-w-md bg-white shadow-md rounded-lg px-6 py-6">
            {{ $slot }}
        </div>

        <!-- FOOTER -->
        <div class="mt-6 text-sm text-gray-500">
            © {{ date('Y') }} KP2MI — Sistem Pengaduan PMI
        </div>

    </div>

</body>
</html>
