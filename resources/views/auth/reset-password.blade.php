@extends('layouts.public')

@section('title', 'Reset Password')

@section('content')
<section class="bg-gray-100 min-h-[calc(100vh-140px)] flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

        {{-- HEADER --}}
        <div class="text-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">
                Reset Password
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Silakan masukkan password baru Anda
            </p>
        </div>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            {{-- Token --}}
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email', $request->email) }}"
                    required
                    autofocus
                    class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500"
                >
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Password Baru
                </label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500"
                >
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    Konfirmasi Password
                </label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500"
                >
                @error('password_confirmation')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- BUTTON --}}
            <button
                type="submit"
                class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg transition"
            >
                Reset Password
            </button>
        </form>
    </div>
</section>
@endsection
