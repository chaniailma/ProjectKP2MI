@extends('layouts.admin')

@section('title', 'Edit Pengaduan')

@section('content')

<div style="max-width:1200px; margin:auto;">

    <div style="background:#ffffff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,.08);">
        
        <!-- CARD HEADER -->
        <div style="padding:16px 20px; border-bottom:1px solid #e5e7eb;">
            <h3 style="margin:0;">Edit Pengaduan</h3>
        </div>

        <!-- CARD BODY -->
        <div style="padding:20px;">
            <form action="{{ route('admin.pengaduan.update', $pengaduan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

                    <!-- KOLOM KIRI -->
                    <div>
                        <label>Nama PMI</label>
                        <input type="text" name="nama_pmi" value="{{ old('nama_pmi', $pengaduan->nama_pmi) }}" required class="form-input">

                        <label>NIK</label>
                        <input type="text" name="nik" value="{{ old('nik', $pengaduan->nik) }}" required class="form-input">

                        <label>Gender</label>
                        <select name="gender" class="form-input">
                            <option value="Laki-laki" {{ $pengaduan->gender=='Laki-laki'?'selected':'' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $pengaduan->gender=='Perempuan'?'selected':'' }}>Perempuan</option>
                        </select>

                        <label>Status Marital</label>
                        <input type="text" name="status_marital" value="{{ old('status_marital', $pengaduan->status_marital) }}" class="form-input">

                        <label>Jenjang Pendidikan</label>
                        <input type="text" name="jenjang_pendidikan" value="{{ old('jenjang_pendidikan', $pengaduan->jenjang_pendidikan) }}" class="form-input">

                        <label>Nomor Paspor</label>
                        <input type="text" name="nomor_paspor" value="{{ old('nomor_paspor', $pengaduan->nomor_paspor) }}" class="form-input">

                        <label>Alamat Indonesia</label>
                        <input type="text" name="alamat_indonesia" value="{{ old('alamat_indonesia', $pengaduan->alamat_indonesia) }}" class="form-input">

                        <label>Kabupaten / Kota</label>
                        <input type="text" name="kabupaten_kota" value="{{ old('kabupaten_kota', $pengaduan->kabupaten_kota) }}" class="form-input">

                        <label>Provinsi</label>
                        <input type="text" name="provinsi" value="{{ old('provinsi', $pengaduan->provinsi) }}" class="form-input">
                    </div>

                    <!-- KOLOM KANAN -->
                    <div>
                        <label>Negara Penempatan</label>
                        <input type="text" name="negara_penempatan" value="{{ old('negara_penempatan', $pengaduan->negara_penempatan) }}" class="form-input">

                        <label>Alamat Penempatan</label>
                        <input type="text" name="alamat_penempatan" value="{{ old('alamat_penempatan', $pengaduan->alamat_penempatan) }}" class="form-input">

                        <label>P3MI</label>
                        <input type="text" name="p3mi" value="{{ old('p3mi', $pengaduan->p3mi) }}" class="form-input">

                        <label>Nama Majikan</label>
                        <input type="text" name="nama_majikan" value="{{ old('nama_majikan', $pengaduan->nama_majikan) }}" class="form-input">

                        <label>Tipe Terlapor</label>
                        <input type="text" name="tipe_terlapor" value="{{ old('tipe_terlapor', $pengaduan->tipe_terlapor) }}" class="form-input">

                        <label>Nama Terlapor</label>
                        <input type="text" name="nama_terlapor" value="{{ old('nama_terlapor', $pengaduan->nama_terlapor) }}" class="form-input">

                        <label>Kontak Terlapor</label>
                        <input type="text" name="kontak_terlapor" value="{{ old('kontak_terlapor', $pengaduan->kontak_terlapor) }}" class="form-input">

                        <label>Alamat Terlapor</label>
                        <input type="text" name="alamat_terlapor" value="{{ old('alamat_terlapor', $pengaduan->alamat_terlapor) }}" class="form-input">

                        <label>Nama Pengadu</label>
                        <input type="text" name="nama_pengadu" value="{{ old('nama_pengadu', $pengaduan->nama_pengadu) }}" class="form-input">

                        <label>Telepon Pengadu</label>
                        <input type="text" name="telepon_pengadu" value="{{ old('telepon_pengadu', $pengaduan->telepon_pengadu) }}" class="form-input">
                    </div>
                </div>

                <!-- FULL WIDTH -->
                <div style="margin-top:20px;">
                    <label>Relasi Pengadu</label>
                    <input type="text" name="relasi_pengadu" value="{{ old('relasi_pengadu', $pengaduan->relasi_pengadu) }}" class="form-input">

                    <label>Media Pengadu</label>
                    <input type="text" name="media_pengadu" value="{{ old('media_pengadu', $pengaduan->media_pengadu) }}" class="form-input">

                    <label>Tuntutan</label>
                    <textarea name="tuntutan" class="form-input" rows="3">{{ old('tuntutan', $pengaduan->tuntutan) }}</textarea>

                    <label>Kategori Pengaduan</label>
                    <input type="text" name="kategori_pengaduan" value="{{ old('kategori_pengaduan', $pengaduan->kategori_pengaduan) }}" class="form-input">

                    <label>Penjelasan Pengaduan</label>
                    <textarea name="penjelasan_pengaduan" class="form-input" rows="3">{{ old('penjelasan_pengaduan', $pengaduan->penjelasan_pengaduan) }}</textarea>
                </div>

                <!-- BUTTON -->
                <div style="margin-top:20px;">
                    <button type="submit" style="padding:8px 16px; background:#2563eb; color:white; border:none; border-radius:6px;">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.pengaduan.index') }}" style="margin-left:10px;">Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
