@extends('layouts.public')

@section('title', 'Login | Sistem Pengaduan PMI')

@section('content')
<section class="bg-white min-h-[calc(100vh-140px)] flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

        <!-- LOGO -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo-bp2mi.png') }}"
                 alt="KP2MI"
                 class="h-16">
        </div>

        <!-- JUDUL -->
        <h2 class="text-2xl font-bold text-center text-blue-900 mb-2">
            Login Pengaduan PMI
        </h2>
        <p class="text-center text-sm text-gray-600 mb-6">
            Sistem Pengaduan Pekerja Migran Indonesia
        </p>

        <!-- SESSION STATUS -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- EMAIL -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">
                    Email
                </label>
                <input id="email"
                       type="email"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autofocus
                       class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">
                    Password
                </label>
                <input id="password"
                       type="password"
                       name="password"
                       required
                       class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- REMEMBER -->
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center text-sm">
                    <input type="checkbox"
                           name="remember"
                           class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-gray-600">Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-sm text-blue-700 hover:underline">
                        Lupa password?
                    </a>
                @endif
            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="w-full bg-blue-900 text-yellow-400 py-2 rounded-lg
                           hover:bg-blue-800 transition font-semibold">
                Login
            </button>
        </form>
    </div>
</section>
@endsection
