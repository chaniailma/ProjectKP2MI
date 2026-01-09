@extends('layouts.public')

@section('title', 'Lupa Password')

@section('content')
<section class="bg-white min-h-[calc(100vh-140px)] flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

        {{-- LOGO --}}
        <div class="flex justify-center mb-4">
            <img
                src="{{ asset('images/logo-bp2mi.png') }}"
                alt="Logo KP2MI"
                class="h-16"
            >
        </div>

        {{-- HEADER --}}
        <div class="text-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">
                Lupa Password
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Masukkan email untuk menerima link reset password
            </p>
        </div>

        {{-- ALERT STATUS (SETELAH SEND) --}}
        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600 text-center">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            {{-- EMAIL --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500"
                >
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            

            {{-- BUTTON --}}
            <button
                type="submit"
                class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg transition"
            >
                Kirim Link Reset Password
            </button>
        </form>

        {{-- BACK TO LOGIN --}}
        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-red-600">
                Kembali ke Login
            </a>
        </div>

    </div>
</section>
@endsection
