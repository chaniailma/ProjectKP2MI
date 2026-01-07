@extends('layouts.admin')
@section('content')
<h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>

<div style="padding:20px;background:#f3f4f6;width:300px">
    <p>Total Pengaduan</p>
    <h2 style="font-size:32px">{{ $totalPengaduan }}</h2>
</div>
@endsection
