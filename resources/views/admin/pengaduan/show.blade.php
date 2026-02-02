@extends('layouts.admin')

@section('content')

<div class="container-detail">

    {{-- ================= HEADER ATAS ================= --}}
    <div class="page-header">
        <h1 class="title">Detail Pengaduan</h1>

        <a href="{{ route('admin.pengaduan.index') }}" class="btn-back-top">
            ← Kembali
        </a>
    </div>

    {{-- ================= INFORMASI UMUM ================= --}}
    <div class="card">
        <h3 class="card-title">Informasi Umum</h3>
        <table>
            <tr>
                <th>Asal Pengaduan</th>
                <td>{{ $pengaduan->asal_pengaduan ?? '-' }}</td>
            </tr>

            {{-- STATUS BISA DIUBAH --}}
            <tr>
                <th>Status Pengaduan</th>
                <td>
                    <form method="POST"
                          action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}"
                          class="status-form">
                        @csrf
                        @method('PUT')

                        <select name="status_pengaduan">
                            <option value="belum" {{ $pengaduan->status_pengaduan == 'belum' ? 'selected' : '' }}>
                                Belum Diproses
                            </option>
                            <option value="diproses" {{ $pengaduan->status_pengaduan == 'diproses' ? 'selected' : '' }}>
                                Diproses
                            </option>
                            <option value="selesai" {{ $pengaduan->status_pengaduan == 'selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>
                        </select>

                        <button type="submit">Simpan</button>
                    </form>
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

    {{-- ================= DATA PMI ================= --}}
    <div class="card">
        <h3 class="card-title">Data PMI</h3>
        <table>
            <tr><th>Nama PMI</th><td>{{ $pengaduan->nama_pmi ?? '-' }}</td></tr>
            <tr><th>NIK</th><td>{{ $pengaduan->nik ?? '-' }}</td></tr>
            <tr><th>Gender</th><td>{{ $pengaduan->gender ?? '-' }}</td></tr>
            <tr><th>Status Marital</th><td>{{ $pengaduan->status_marital ?? '-' }}</td></tr>
            <tr><th>Pendidikan</th><td>{{ $pengaduan->jenjang_pendidikan ?? '-' }}</td></tr>
            <tr><th>Nomor Paspor</th><td>{{ $pengaduan->nomor_paspor ?? '-' }}</td></tr>
            <tr><th>Alamat Indonesia</th><td>{{ $pengaduan->alamat_indonesia ?? '-' }}</td></tr>
            <tr><th>Kab/Kota</th><td>{{ $pengaduan->kabupaten_kota ?? '-' }}</td></tr>
            <tr><th>Provinsi</th><td>{{ $pengaduan->provinsi ?? '-' }}</td></tr>
        </table>
    </div>

    {{-- ================= DATA PENEMPATAN ================= --}}
    <div class="card">
        <h3 class="card-title">Data Penempatan</h3>
        <table>
            <tr><th>Negara Penempatan</th><td>{{ $pengaduan->negara_penempatan ?? '-' }}</td></tr>
            <tr><th>Alamat Penempatan</th><td>{{ $pengaduan->alamat_penempatan ?? '-' }}</td></tr>
            <tr><th>P3MI</th><td>{{ $pengaduan->p3mi ?? '-' }}</td></tr>
            <tr><th>Nama Majikan</th><td>{{ $pengaduan->nama_majikan ?? '-' }}</td></tr>
        </table>
    </div>

    {{-- ================= DATA TERLAPOR ================= --}}
    <div class="card">
        <h3 class="card-title">Data Terlapor</h3>
        <table>
            <tr><th>Tipe Terlapor</th><td>{{ $pengaduan->tipe_terlapor ?? '-' }}</td></tr>
            <tr><th>Nama Terlapor</th><td>{{ $pengaduan->nama_terlapor ?? '-' }}</td></tr>
            <tr><th>Kontak Terlapor</th><td>{{ $pengaduan->kontak_terlapor ?? '-' }}</td></tr>
            <tr><th>Alamat Terlapor</th><td>{{ $pengaduan->alamat_terlapor ?? '-' }}</td></tr>
        </table>
    </div>

    {{-- ================= DATA PENGADU ================= --}}
    <div class="card">
        <h3 class="card-title">Data Pengadu</h3>
        <table>
            <tr><th>Nama Pengadu</th><td>{{ $pengaduan->nama_pengadu ?? '-' }}</td></tr>
            <tr><th>Alamat Pengadu</th><td>{{ $pengaduan->alamat_pengadu ?? '-' }}</td></tr>
            <tr><th>Telepon</th><td>{{ $pengaduan->telepon_pengadu ?? '-' }}</td></tr>
            <tr><th>Relasi</th><td>{{ $pengaduan->relasi_pengadu ?? '-' }}</td></tr>
            <tr><th>Media Pengadu</th><td>{{ $pengaduan->media_pengadu ?? '-' }}</td></tr>
        </table>
    </div>

    {{-- ================= DETAIL PENGADUAN ================= --}}
    <div class="card">
        <h3 class="card-title">Detail Pengaduan</h3>
        <table>
            <tr><th>Kategori</th><td>{{ $pengaduan->klasifikasi_pengaduan ?? '-' }}</td></tr>
            <tr><th>Tuntutan</th><td>{{ $pengaduan->tuntutan ?? '-' }}</td></tr>
            <tr>
                <th>Penjelasan</th>
                <td style="white-space: pre-line;">
                    {{ $pengaduan->deskripsi_permasalahan ?? '-' }}
                </td>
            </tr>
        </table>
    </div>

    {{-- ================= BUTTON BAWAH ================= --}}
    <div class="action-buttons">
        <a href="{{ route('admin.pengaduan.pdf', $pengaduan->id) }}" class="btn-secondary">
            Download PDF
        </a>
    </div>

</div>

{{-- ================= CSS ================= --}}
<style>
.container-detail {
    max-width: 1200px;
    margin: 0 auto;
    background: #ffffff;
    padding: 24px;
    border-radius: 10px;
}

/* HEADER */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.title {
    font-size: 26px;
    font-weight: 700;
    margin: 0;
}

.btn-back-top {
    padding: 8px 16px;
    background: #e5e7eb;
    color: #374151;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
}

/* CARD */
.card {
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 24px;
}

.card-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 12px;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
}

th {
    width: 30%;
    background: #f9fafb;
    padding: 12px;
    border: 1px solid #e5e7eb;
    text-align: left;
}

td {
    padding: 12px;
    border: 1px solid #e5e7eb;
}

/* STATUS */
.status-form {
    display: flex;
    gap: 10px;
    align-items: center;
}

.status-form select {
    padding: 6px 10px;
    border-radius: 6px;
    border: 1px solid #d1d5db;
}

.status-form button {
    padding: 6px 14px;
    background: #2563eb;
    color: #fff;
    border-radius: 6px;
    border: none;
}

/* BUTTON BAWAH */
.action-buttons {
    display: flex;
    justify-content: flex-end;
}

.btn-secondary {
    padding: 10px 18px;
    background: #059669;
    color: #fff;
    border-radius: 6px;
    text-decoration: none;
}
</style>

@endsection
