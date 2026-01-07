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
<tr><td>Tuntutan</td><td>{{ $pengaduan->tuntutan }}</td></tr>
<tr><td>Penjelasan</td><td>{{ $pengaduan->penjelasan_pengaduan }}</td></tr>
</table>

</div>
</x-app-layout>
