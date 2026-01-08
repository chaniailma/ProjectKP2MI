@extends('layouts.public')

@section('title', 'Sistem Pengaduan PMI | KP2MI')

@section('content')
<section class="bg-yellow-400 min-h-[calc(100vh-140px)] flex items-center">
    <div class="max-w-7xl mx-auto px-6 py-20
                grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <div>
            <h1 class="text-3xl lg:text-4xl font-bold mb-4 text-blue-900">
                Sistem Pengaduan<br>Pekerja Migran Indonesia
            </h1>

            <p class="text-blue-900 mb-8 leading-relaxed">
                Platform resmi <strong>KP2MI</strong>
                untuk menerima, memproses, dan memantau pengaduan
                secara aman, transparan, dan terintegrasi.
            </p>

            <a href="{{ route('pengaduan.create') }}"
               class="inline-block px-6 py-3 bg-blue-900 text-yellow-400 rounded
                      hover:bg-blue-800 transition font-semibold shadow">
                Daftar Pengaduan
            </a>
        </div>

        <div class="hidden lg:flex justify-center">
            <img src="{{ asset('images/BP2MI.png') }}"
                 class="max-w-md w-full h-auto drop-shadow-lg"
                 alt="PMI">
        </div>

    </div>
</section>
@endsection
