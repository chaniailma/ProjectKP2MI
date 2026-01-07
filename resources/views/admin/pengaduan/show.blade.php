@extends('layouts.admin')

@section('content')

<div class="container-detail">

    <h1 class="title">Detail Pengaduan</h1>

    {{-- INFORMASI UMUM --}}
    <div class="card">
        <h3 class="card-title">Informasi Umum</h3>
        <table>
            <tr>
                <th>Asal Pengaduan</th>
                <td>{{ $pengaduan->asal_pengaduan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Status Pengaduan</th>
                <td>
                    <span class="badge">
                        {{ $pengaduan->status_pengaduan ?? 'Terima Pengaduan' }}
                    </span>
                </td>
            </tr>
            <tr>
                <th>Tanggal Lapor</th>
                <td>{{ $pengaduan->tanggal_lapor ?? '-' }}</td>
            </tr>
            <tr>
                <th>Unit Kerja</th>
                <td>{{ $pengaduan->unit_kerja ?? '-' }}</td>
            </tr>
        </table>
    </div>

    {{-- DATA PMI --}}
    <div class="card">
        <h3 class="card-title">Data PMI</h3>
        <table>
            <tr><th>Nama PMI</th><td>{{ $pengaduan->nama_pmi }}</td></tr>
            <tr><th>NIK</th><td>{{ $pengaduan->nik }}</td></tr>
            <tr><th>Gender</th><td>{{ $pengaduan->gender ?? '-' }}</td></tr>
            <tr><th>Status Marital</th><td>{{ $pengaduan->status_marital ?? '-' }}</td></tr>
            <tr><th>Pendidikan</th><td>{{ $pengaduan->jenjang_pendidikan ?? '-' }}</td></tr>
            <tr><th>Nomor Paspor</th><td>{{ $pengaduan->nomor_paspor ?? '-' }}</td></tr>
            <tr><th>Alamat Indonesia</th><td>{{ $pengaduan->alamat_indonesia ?? '-' }}</td></tr>
            <tr><th>Kab/Kota</th><td>{{ $pengaduan->kabupaten_kota ?? '-' }}</td></tr>
            <tr><th>Provinsi</th><td>{{ $pengaduan->provinsi ?? '-' }}</td></tr>
        </table>
    </div>

    {{-- DATA PENEMPATAN --}}
    <div class="card">
        <h3 class="card-title">Data Penempatan</h3>
        <table>
            <tr><th>Negara</th><td>{{ $pengaduan->negara_penempatan ?? '-' }}</td></tr>
            <tr><th>Alamat</th><td>{{ $pengaduan->alamat_penempatan ?? '-' }}</td></tr>
            <tr><th>P3MI</th><td>{{ $pengaduan->p3mi ?? '-' }}</td></tr>
            <tr><th>Nama Majikan</th><td>{{ $pengaduan->nama_majikan ?? '-' }}</td></tr>
        </table>
    </div>

    {{-- DATA TERLAPOR --}}
    <div class="card">
        <h3 class="card-title">Data Terlapor</h3>
        <table>
            <tr><th>Tipe Terlapor</th><td>{{ $pengaduan->tipe_terlapor ?? '-' }}</td></tr>
            <tr><th>Nama Terlapor</th><td>{{ $pengaduan->nama_terlapor ?? '-' }}</td></tr>
            <tr><th>Kontak</th><td>{{ $pengaduan->kontak_terlapor ?? '-' }}</td></tr>
            <tr><th>Alamat</th><td>{{ $pengaduan->alamat_terlapor ?? '-' }}</td></tr>
        </table>
    </div>

    {{-- DATA PENGADU --}}
    <div class="card">
        <h3 class="card-title">Data Pengadu</h3>
        <table>
            <tr><th>Nama</th><td>{{ $pengaduan->nama_pengadu ?? '-' }}</td></tr>
            <tr><th>Alamat</th><td>{{ $pengaduan->alamat_pengadu ?? '-' }}</td></tr>
            <tr><th>Telepon</th><td>{{ $pengaduan->telepon_pengadu ?? '-' }}</td></tr>
            <tr><th>Relasi</th><td>{{ $pengaduan->relasi_pengadu ?? '-' }}</td></tr>
            <tr><th>Media</th><td>{{ $pengaduan->media_pengadu ?? '-' }}</td></tr>
        </table>
    </div>

    {{-- DETAIL PENGADUAN --}}
    <div class="card">
        <h3 class="card-title">Detail Pengaduan</h3>
        <table>
            <tr><th>Kategori</th><td>{{ $pengaduan->kategori_pengaduan ?? '-' }}</td></tr>
            <tr><th>Tuntutan</th><td>{{ $pengaduan->tuntutan ?? '-' }}</td></tr>
            <tr>
                <th>Penjelasan</th>
                <td style="white-space:pre-line">
                    {{ $pengaduan->penjelasan_pengaduan ?? '-' }}
                </td>
            </tr>
        </table>
    </div>

    <a href="{{ route('admin.pengaduan.index') }}" class="btn-back">
        ← Kembali ke Daftar
    </a>
    <a href="{{ route('admin.pengaduan.pdf', $pengaduan->id) }}" class="btn-back">
        Download PDF
    </a>
    

</div>

{{-- CSS KHUSUS BIAR PASTI KELIHATAN --}}
<style>
.container-detail {
    max-width: 1200px;
    background: #ffffff;
    padding: 24px;
    border-radius: 10px;
    color: #111827;
}

.title {
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 20px;
}

.card {
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 20px;
    background: #ffffff;
}

.card-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 12px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    width: 30%;
    background: #f3f4f6;
    color: #111827;
    text-align: left;
    padding: 10px;
    border: 1px solid #d1d5db;
    vertical-align: top;
}

td {
    padding: 10px;
    border: 1px solid #d1d5db;
    color: #111827;
}

.badge {
    background: #2563eb;
    color: white;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 14px;
}

.btn-back {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 18px;
    background: #1d4ed8;
    color: #ffffff;
    text-decoration: none;
    border-radius: 6px;
}
</style>

@endsection
