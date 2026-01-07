@extends('layouts.admin')

@section('title', 'Edit Pengaduan')

@section('content')

<h2>Edit Pengaduan</h2>

<form action="{{ route('admin.pengaduan.update', $pengaduan->id) }}" method="POST">
    @csrf
    @method('PUT') {{-- Method PUT untuk update --}}

    <table>
        <tr>
            <td>Nama PMI</td>
            <td><input type="text" name="nama_pmi" value="{{ old('nama_pmi', $pengaduan->nama_pmi) }}" required></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td><input type="text" name="nik" value="{{ old('nik', $pengaduan->nik) }}" required></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                <select name="gender" required>
                    <option value="Laki-laki" {{ $pengaduan->gender=='Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $pengaduan->gender=='Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Status Marital</td>
            <td><input type="text" name="status_marital" value="{{ old('status_marital', $pengaduan->status_marital) }}"></td>
        </tr>
        <tr>
            <td>Jenjang Pendidikan</td>
            <td><input type="text" name="jenjang_pendidikan" value="{{ old('jenjang_pendidikan', $pengaduan->jenjang_pendidikan) }}"></td>
        </tr>
        <tr>
            <td>Nomor Paspor</td>
            <td><input type="text" name="nomor_paspor" value="{{ old('nomor_paspor', $pengaduan->nomor_paspor) }}"></td>
        </tr>
        <tr>
            <td>Alamat Indonesia</td>
            <td><input type="text" name="alamat_indonesia" value="{{ old('alamat_indonesia', $pengaduan->alamat_indonesia) }}"></td>
        </tr>
        <tr>
            <td>Kabupaten/Kota</td>
            <td><input type="text" name="kabupaten_kota" value="{{ old('kabupaten_kota', $pengaduan->kabupaten_kota) }}"></td>
        </tr>
        <tr>
            <td>Provinsi</td>
            <td><input type="text" name="provinsi" value="{{ old('provinsi', $pengaduan->provinsi) }}"></td>
        </tr>
        <tr>
            <td>Negara Penempatan</td>
            <td><input type="text" name="negara_penempatan" value="{{ old('negara_penempatan', $pengaduan->negara_penempatan) }}"></td>
        </tr>
        <tr>
            <td>Alamat Penempatan</td>
            <td><input type="text" name="alamat_penempatan" value="{{ old('alamat_penempatan', $pengaduan->alamat_penempatan) }}"></td>
        </tr>
        <tr>
            <td>P3MI</td>
            <td><input type="text" name="p3mi" value="{{ old('p3mi', $pengaduan->p3mi) }}"></td>
        </tr>
        <tr>
            <td>Nama Majikan</td>
            <td><input type="text" name="nama_majikan" value="{{ old('nama_majikan', $pengaduan->nama_majikan) }}"></td>
        </tr>
        <tr>
            <td>Tipe Terlapor</td>
            <td><input type="text" name="tipe_terlapor" value="{{ old('tipe_terlapor', $pengaduan->tipe_terlapor) }}"></td>
        </tr>
        <tr>
            <td>Nama Terlapor</td>
            <td><input type="text" name="nama_terlapor" value="{{ old('nama_terlapor', $pengaduan->nama_terlapor) }}"></td>
        </tr>
        <tr>
            <td>Kontak Terlapor</td>
            <td><input type="text" name="kontak_terlapor" value="{{ old('kontak_terlapor', $pengaduan->kontak_terlapor) }}"></td>
        </tr>
        <tr>
            <td>Alamat Terlapor</td>
            <td><input type="text" name="alamat_terlapor" value="{{ old('alamat_terlapor', $pengaduan->alamat_terlapor) }}"></td>
        </tr>
        <tr>
            <td>Nama Pengadu</td>
            <td><input type="text" name="nama_pengadu" value="{{ old('nama_pengadu', $pengaduan->nama_pengadu) }}"></td>
        </tr>
        <tr>
            <td>Alamat Pengadu</td>
            <td><input type="text" name="alamat_pengadu" value="{{ old('alamat_pengadu', $pengaduan->alamat_pengadu) }}"></td>
        </tr>
        <tr>
            <td>Telepon Pengadu</td>
            <td><input type="text" name="telepon_pengadu" value="{{ old('telepon_pengadu', $pengaduan->telepon_pengadu) }}"></td>
        </tr>
        <tr>
            <td>Relasi Pengadu</td>
            <td><input type="text" name="relasi_pengadu" value="{{ old('relasi_pengadu', $pengaduan->relasi_pengadu) }}"></td>
        </tr>
        <tr>
            <td>Media Pengadu</td>
            <td><input type="text" name="media_pengadu" value="{{ old('media_pengadu', $pengaduan->media_pengadu) }}"></td>
        </tr>
        <tr>
            <td>Tuntutan</td>
            <td><textarea name="tuntutan">{{ old('tuntutan', $pengaduan->tuntutan) }}</textarea></td>
        </tr>
        <tr>
            <td>Kategori Pengaduan</td>
            <td><input type="text" name="kategori_pengaduan" value="{{ old('kategori_pengaduan', $pengaduan->kategori_pengaduan) }}"></td>
        </tr>
        <tr>
            <td>Penjelasan Pengaduan</td>
            <td><textarea name="penjelasan_pengaduan">{{ old('penjelasan_pengaduan', $pengaduan->penjelasan_pengaduan) }}</textarea></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit"
                        style="padding:8px 16px; background-color:#2563eb; color:white; border:none; border-radius:5px;">
                    Simpan Perubahan
                </button>
            </td>
        </tr>
    </table>
</form>

@endsection
