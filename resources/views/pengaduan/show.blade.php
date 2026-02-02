<x-app-layout>
<div class="max-w-7xl mx-auto p-6">

<h3 class="text-xl font-bold mb-4">Detail Pengaduan</h3>

<table class="table-auto w-full">
<tr><td>Nama PMI</td><td>{{ $pengaduan->nama_pmi }}</td></tr>
<tr><td>Gender</td><td>{{ $pengaduan->gender }}</td></tr>
<tr><td>Status Marital</td><td>{{ $pengaduan->status_marital }}</td></tr>
<tr><td>Jenjang Pendidikan</td><td>{{ $pengaduan->jenjang_pendidikan }}</td></tr>
<tr><td>No Paspor</td><td>{{ $pengaduan->nomor_paspor }}</td></tr>
<tr><td>NIK</td><td>{{ $pengaduan->nik }}</td></tr>
<tr><td>Alamat Indonesia</td><td>{{ $pengaduan->alamat_indonesia }}</td></tr>
<tr><td>Negara Penempatan</td><td>{{ $pengaduan->negara_penempatan }}</td></tr>
<tr><td>Nama Majikan</td><td>{{ $pengaduan->nama_majikan }}</td></tr>
<tr><td>Alamat Penempatan</td><td>{{ $pengaduan->alamat_penempatan }}</td></tr>
<tr><td>Kategori</td><td>{{ $pengaduan->klasifikasi_pengaduan }}</td></tr>
<tr><td>Nama Terlapor</td><td>{{ $pengaduan->nama_terlapor }}</td></tr>
<tr><td>Kontak Terlapor</td><td>{{ $pengaduan->kontak_terlapor }}</td></tr>
<tr><td>Alamat Terlapor</td><td>{{ $pengaduan->alamat_terlapor }}</td></tr>
<tr><td>Nama Pengadu</td><td>{{ $pengaduan->nama_pengadu }}</td></tr>
<tr><td>Alamat Pengadu</td><td>{{ $pengaduan->alamat_pengadu }}</td></tr>
<tr><td>Telepon Pengadu</td><td>{{ $pengaduan->telepon_pengadu }}</td></tr>
<tr><td>Relasi Pengadu</td><td>{{ $pengaduan->relasi_pengadu }}</td></tr>
<tr><td>Media Pengadu</td><td>{{ $pengaduan->media_pengadu }}</td></tr>
<tr><td>Tanggal Lapor</td><td>{{ $pengaduan->tanggal_lapor }}</td></tr>
<tr><td>Tanggal Entry</td><td>{{ $pengaduan->tanggal_entry }}</td></tr>
<tr><td>Status Pengaduan</td><td>{{ $pengaduan->status_pengaduan }}</td></tr>
<tr><td>Asal Pengaduan</td><td>{{ $pengaduan->asal_pengaduan }}</td></tr>
<tr><td>Unit Kerja</td><td>{{ $pengaduan->unit_kerja }}</td></tr>
<tr><td>Tuntutan</td><td>{{ $pengaduan->tuntutan }}</td></tr>
<tr><td>Penjelasan</td><td>{{ $pengaduan->deskripsi_permasalahan }}</td></tr>
</table>

</div>
</x-app-layout>
