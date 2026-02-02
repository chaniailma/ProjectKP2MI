@extends('layouts.admin')

@section('title', 'Edit Pengaduan')

@section('content')

<div class="container-edit">

    <div class="card">

        {{-- ================= HEADER FIXED ================= --}}
        <div class="card-header-fixed">
            <div class="header-left">
                <span class="header-icon">✏️</span>
                <h2 class="card-title">Edit Data Pengaduan</h2>
            </div>

            <div class="header-right">
                <a href="{{ route('admin.pengaduan.index') }}" class="btn-back">
                    ← Kembali
                </a>
            </div>
        </div>

        {{-- ================= BODY ================= --}}
        <div class="card-body">
            <form action="{{ route('admin.pengaduan.update', $pengaduan->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- ================= DATA PMI ================= --}}
                <h4 class="section-title">Data PMI</h4>
                <div class="grid-2">
                    <div>
                        <label>Nama PMI</label>
                        <input type="text" name="nama_pmi" value="{{ old('nama_pmi', $pengaduan->nama_pmi) }}" class="form-input">

                        <label>NIK</label>
                        <input type="text" name="nik" value="{{ old('nik', $pengaduan->nik) }}" class="form-input">

                        <label>Gender</label>
                        <select name="gender" class="form-input">
                            <option value="Laki-laki" {{ $pengaduan->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $pengaduan->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>

                        <label>Status Marital</label>
                        <input type="text" name="status_marital" value="{{ old('status_marital', $pengaduan->status_marital) }}" class="form-input">
                    </div>

                    <div>
                        <label>Jenjang Pendidikan</label>
                        <input type="text" name="jenjang_pendidikan" value="{{ old('jenjang_pendidikan', $pengaduan->jenjang_pendidikan) }}" class="form-input">

                        <label>Nomor Paspor</label>
                        <input type="text" name="nomor_paspor" value="{{ old('nomor_paspor', $pengaduan->nomor_paspor) }}" class="form-input">

                        <label>Alamat Indonesia</label>
                        <input type="text" name="alamat_indonesia" value="{{ old('alamat_indonesia', $pengaduan->alamat_indonesia) }}" class="form-input">
                    </div>
                </div>

                {{-- ================= DOMISILI ================= --}}
                <h4 class="section-title">Domisili</h4>
                <div class="grid-2">
                    <div>
                        <label>Kabupaten / Kota</label>
                        <input type="text" name="kabupaten_kota" value="{{ old('kabupaten_kota', $pengaduan->kabupaten_kota) }}" class="form-input">
                    </div>
                    <div>
                        <label>Provinsi</label>
                        <input type="text" name="provinsi" value="{{ old('provinsi', $pengaduan->provinsi) }}" class="form-input">
                    </div>
                </div>

                {{-- ================= DATA PENEMPATAN ================= --}}
                <h4 class="section-title">Data Penempatan</h4>
                <div class="grid-2">
                    <div>
                        <label>Negara Penempatan</label>
                        <input type="text" name="negara_penempatan" value="{{ old('negara_penempatan', $pengaduan->negara_penempatan) }}" class="form-input">

                        <label>Alamat Penempatan</label>
                        <input type="text" name="alamat_penempatan" value="{{ old('alamat_penempatan', $pengaduan->alamat_penempatan) }}" class="form-input">
                    </div>

                    <div>
                        <label>P3MI</label>
                        <input type="text" name="p3mi" value="{{ old('p3mi', $pengaduan->p3mi) }}" class="form-input">

                        <label>Nama Majikan</label>
                        <input type="text" name="nama_majikan" value="{{ old('nama_majikan', $pengaduan->nama_majikan) }}" class="form-input">
                    </div>
                </div>

                {{-- ================= DATA TERLAPOR ================= --}}
                <h4 class="section-title">Data Terlapor</h4>
                <div class="grid-2">
                    <div>
                        <label>Tipe Terlapor</label>
                        <input type="text" name="tipe_terlapor" value="{{ old('tipe_terlapor', $pengaduan->tipe_terlapor) }}" class="form-input">

                        <label>Nama Terlapor</label>
                        <input type="text" name="nama_terlapor" value="{{ old('nama_terlapor', $pengaduan->nama_terlapor) }}" class="form-input">
                    </div>

                    <div>
                        <label>Kontak Terlapor</label>
                        <input type="text" name="kontak_terlapor" value="{{ old('kontak_terlapor', $pengaduan->kontak_terlapor) }}" class="form-input">

                        <label>Alamat Terlapor</label>
                        <input type="text" name="alamat_terlapor" value="{{ old('alamat_terlapor', $pengaduan->alamat_terlapor) }}" class="form-input">
                    </div>
                </div>

                {{-- ================= DATA PENGADU ================= --}}
                <h4 class="section-title">Data Pengadu</h4>
                <div class="grid-2">
                    <div>
                        <label>Nama Pengadu</label>
                        <input type="text" name="nama_pengadu" value="{{ old('nama_pengadu', $pengaduan->nama_pengadu) }}" class="form-input">

                        <label>Telepon Pengadu</label>
                        <input type="text" name="telepon_pengadu" value="{{ old('telepon_pengadu', $pengaduan->telepon_pengadu) }}" class="form-input">
                    </div>

                    <div>
                        <label>Relasi Pengadu</label>
                        <input type="text" name="relasi_pengadu" value="{{ old('relasi_pengadu', $pengaduan->relasi_pengadu) }}" class="form-input">

                        <label>Media Pengadu</label>
                        <input type="text" name="media_pengadu" value="{{ old('media_pengadu', $pengaduan->media_pengadu) }}" class="form-input">
                    </div>
                </div>

                {{-- ================= DETAIL PENGADUAN ================= --}}
                <h4 class="section-title">Detail Pengaduan</h4>

                <label>Kategori Pengaduan</label>
                <input type="text" name="klasifikasi_pengaduan"
                       value="{{ old('klasifikasi_pengaduan', $pengaduan->klasifikasi_pengaduan) }}"
                       class="form-input">

                <label>Tuntutan</label>
                <textarea name="tuntutan" rows="3" class="form-input">{{ old('tuntutan', $pengaduan->tuntutan) }}</textarea>

                <label>Deskripsi Permasalahan</label>
                <textarea name="deskripsi_permasalahan" rows="4" class="form-input">{{ old('deskripsi_permasalahan', $pengaduan->deskripsi_permasalahan) }}</textarea>

                {{-- ================= BUTTON ================= --}}
                <div class="form-action">
                    <button type="submit">💾 Simpan Perubahan</button>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- ================= CSS ================= --}}
<style>
.container-edit {
    max-width: 1200px;
    margin: auto;
}

/* CARD */
.card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,.08);
    overflow: hidden;
}

/* HEADER FIXED */
.card-header-fixed {
    position: sticky;
    top: 0;
    z-index: 20;
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    padding: 16px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.header-left {
    display: flex;
    align-items: center;
    gap: 10px;
}

.header-icon {
    font-size: 22px;
}

.card-title {
    margin: 0;
    font-size: 22px;
    font-weight: 700;
    color: #111827;
}

/* BUTTON BACK */
.btn-back {
    padding: 6px 14px;
    border-radius: 6px;
    background: #e5e7eb;
    color: #374151;
    font-size: 14px;
    text-decoration: none;
}

.btn-back:hover {
    background: #d1d5db;
}

/* BODY */
.card-body {
    padding: 24px;
}

.section-title {
    margin: 30px 0 15px;
    font-size: 16px;
    font-weight: 600;
    border-bottom: 1px solid #e5e7eb;
    padding-bottom: 6px;
    color: #1f2937;
}

.grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

label {
    display: block;
    font-size: 14px;
    margin-bottom: 4px;
    margin-top: 10px;
    color: #374151;
}

.form-input {
    width: 100%;
    padding: 9px 12px;
    border-radius: 6px;
    border: 1px solid #d1d5db;
    font-size: 14px;
}

.form-input:focus {
    outline: none;
    border-color: #2563eb;
}

.form-action {
    margin-top: 35px;
}

.form-action button {
    padding: 10px 22px;
    background: #2563eb;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
}

.form-action button:hover {
    background: #1d4ed8;
}
</style>

@endsection
