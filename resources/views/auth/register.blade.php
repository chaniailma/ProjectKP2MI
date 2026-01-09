@extends('layouts.public')

@section('title', 'Registrasi | Sistem Pengaduan PMI')

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
            Registrasi Akun
        </h2>
        <p class="text-center text-sm text-gray-600 mb-6">
            Sistem Pengaduan Pekerja Migran Indonesia
        </p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- NAMA -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">
                    Nama Lengkap
                </label>
                <input id="name"
                       type="text"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       autofocus
                       class="mt-1 w-full rounded-lg border-gray-300
                              focus:border-blue-500 focus:ring-blue-500">

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

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
                       class="mt-1 w-full rounded-lg border-gray-300
                              focus:border-blue-500 focus:ring-blue-500">

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
                       class="mt-1 w-full rounded-lg border-gray-300
                              focus:border-blue-500 focus:ring-blue-500">

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- KONFIRMASI PASSWORD -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                    Konfirmasi Password
                </label>
                <input id="password_confirmation"
                       type="password"
                       name="password_confirmation"
                       required
                       class="mt-1 w-full rounded-lg border-gray-300
                              focus:border-blue-500 focus:ring-blue-500">

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="w-full bg-blue-900 text-yellow-400 py-2 rounded-lg
                           hover:bg-blue-800 transition font-semibold">
                Daftar
            </button>

            <!-- LINK LOGIN -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Sudah punya akun?
                <a href="{{ route('login') }}"
                   class="text-blue-700 hover:underline font-medium">
                    Login di sini
                </a>
            </p>
        </form>
    </div>
</section>
@endsection
