@extends('layouts.public')

@section('title', 'Form Pengaduan PMI | KP2MI')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-5xl mx-auto bg-white shadow rounded-lg p-8">

        {{-- HEADER --}}
        <div class="flex items-center gap-4 mb-8 border-b pb-4">
            <img src="{{ asset('images/logo-bp2mi.png') }}" class="h-14" alt="KP2MI">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Form Pengaduan PMI</h2>
                <p class="text-sm text-gray-500">
                    Kementerian Pelindungan Pekerja Migran Indonesia (KP2MI)
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('pengaduan.store') }}">
            @csrf

            {{-- ================= TANGGAL ================= --}}
            <div class="mb-10">
                <h4 class="font-semibold text-lg mb-4">Tanggal</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-medium">Tanggal Entry</label>
                        <input type="text" name="tanggal_entry"
                               value="{{ now()->format('d/m/Y') }}" readonly
                               class="form-input bg-gray-200">
                    </div>
                    <div>
                        <label class="text-sm font-medium">Tanggal Lapor</label>
                        <input type="date" name="tanggal_lapor" class="form-input">
                    </div>
                </div>
            </div>

            {{-- ================= DATA PENGADU ================= --}}
            <div class="mb-10">
                <h4 class="font-semibold text-lg mb-4">Data Pengadu</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm font-medium">Media Pengaduan</label>
                        <select name="media_pengaduan" class="form-input">
                            <option value="">-- Pilih Media --</option>
                            <option>Langsung</option>
                            <option>Surat</option>
                            <option>Media Sosial</option>
                            <option>Email</option>
                            <option>Telepon</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium">Nama Pengadu</label>
                        <input type="text" name="nama_pengadu" class="form-input">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Telepon Pengadu</label>
                        <input type="text" name="telepon_pengadu" class="form-input">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Relasi dengan PMI</label>
                        <select name="relasi_pengadu" class="form-input">
                            <option value="">-- Pilih Relasi --</option>
                            <option>PMI</option>
                            <option>Keluarga</option>
                            <option>Kuasa Hukum</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="text-sm font-medium">Alamat Pengadu</label>
                    <textarea name="alamat_pengadu" class="form-textarea"></textarea>
                </div>
            </div>

            {{-- ================= DATA PMI ================= --}}
            <div class="mb-10">
                <h4 class="font-semibold text-lg mb-4">Data PMI</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm font-medium">Nomor Paspor</label>
                        <input type="text" name="nomor_paspor" class="form-input">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Nama PMI</label>
                        <input type="text" name="nama_pmi" class="form-input">
                    </div>

                    <div>
                        <label class="text-sm font-medium">NIK</label>
                        <input type="text" name="nik" class="form-input">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Jenis Kelamin</label>
                        <select name="gender" class="form-input">
                            <option value="">-- Pilih --</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium">Status Perkawinan</label>
                        <select name="status_marital" class="form-input">
                            <option value="">-- Pilih --</option>
                            <option>Belum Kawin</option>
                            <option>Kawin</option>
                            <option>Janda/Duda</option>
                            <option>UNKNOW</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium">Pendidikan Terakhir</label>
                        <select name="jenjang_pendidikan" class="form-input">
                            <option value="">-- Pilih --</option>
                            <option>SD</option>
                            <option>SMP</option>
                            <option>SMA</option>
                            <option>Diploma</option>
                            <option>Sarjana</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="text-sm font-medium">Alamat PMI di Indonesia</label>
                    <textarea name="alamat_indonesia" class="form-textarea"></textarea>
                </div>

                    <div>
                        <label class="text-sm font-medium">Provinsi</label>
                        <select name="provinsi" id="provinsi" class="form-input">
                            <option value="">-- Pilih Provinsi --</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium">Kabupaten / Kota</label>
                        <select name="kabupaten_kota" id="kabupaten" class="form-input" disabled>
                            <option value="">-- Pilih Kabupaten / Kota --</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm font-medium">Negara Penempatan</label>
                        <input type="text" name="negara_penempatan" class="form-input">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="text-sm font-medium">Alamat Tempat Kerja</label>
                    <textarea name="alamat_penempatan" class="form-textarea"></textarea>
                </div>
            </div>
        </div>

            {{-- ================= DETAIL PENGADUAN ================= --}}
            <div class="mb-10">
                <h4 class="font-semibold text-lg mb-4">Detail Pengaduan</h4>

                <div class="mb-4">
                    <label class="text-sm font-medium">Tuntutan</label>
                    <input type="text" name="tuntutan" class="form-input">
                </div>

                <div class="mb-4">
                    <label class="text-sm font-medium">Kategori Pengaduan</label>
                    <input type="text" name="kategori_pengaduan" class="form-input">
                </div>

                <div>
                    <label class="text-sm font-medium">Penjelasan Pengaduan</label>
                    <textarea name="penjelasan_pengaduan" class="form-textarea"></textarea>
                </div>
            </div>

            {{-- ================= ACTION ================= --}}
            <div class="flex justify-between border-t pt-6">
                <a href="{{ url('/') }}" class="px-6 py-2 border rounded">
                    ← Kembali
                </a>
                <button type="submit"
                        class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800">
                    Kirim Pengaduan
                </button>
            </div>

        </form>

        {{-- ================= SCRIPT PROVINSI & KABUPATEN ================= --}}
        <script>
            const dataWilayah = {
                "Aceh": ["Kabupaten Aceh Besar","Kabupaten Aceh Utara","Kabupaten Aceh Timur","Kota Banda Aceh","Kota Lhokseumawe"],
                "Sumatera Utara": ["Kabupaten Deli Serdang","Kabupaten Langkat","Kabupaten Simalungun","Kota Medan","Kota Pematangsiantar"],
                "Sumatera Barat": ["Kabupaten Agam","Kabupaten Tanah Datar","Kota Padang","Kota Bukittinggi"],
                "Riau": ["Kabupaten Kampar","Kabupaten Bengkalis","Kota Pekanbaru"],
                "Lampung": ["Kabupaten Lampung Selatan","Kabupaten Lampung Tengah","Kota Bandar Lampung","Kota Metro"],
                "DKI Jakarta": ["Jakarta Pusat","Jakarta Barat","Jakarta Selatan","Jakarta Timur","Jakarta Utara"],
                "Jawa Barat": ["Kabupaten Bogor","Kabupaten Bandung","Kota Bandung","Kota Bekasi","Kota Depok"],
                "Jawa Tengah": ["Kabupaten Semarang","Kabupaten Banyumas","Kota Semarang","Kota Surakarta"],
                "DI Yogyakarta": ["Kabupaten Sleman","Kabupaten Bantul","Kota Yogyakarta"],
                "Jawa Timur": ["Kabupaten Sidoarjo","Kabupaten Gresik","Kota Surabaya","Kota Malang"],
                "Banten": ["Kabupaten Tangerang","Kota Tangerang","Kota Cilegon"]
            };

            const provinsiSelect = document.getElementById('provinsi');
            const kabupatenSelect = document.getElementById('kabupaten');

            Object.keys(dataWilayah).forEach(p => {
                provinsiSelect.innerHTML += `<option value="${p}">${p}</option>`;
            });

            provinsiSelect.addEventListener('change', function () {
                const provinsi = this.value;
                kabupatenSelect.innerHTML = '<option value="">-- Pilih Kabupaten / Kota --</option>';

                if (provinsi && dataWilayah[provinsi]) {
                    kabupatenSelect.disabled = false;
                    dataWilayah[provinsi].forEach(kab => {
                        kabupatenSelect.innerHTML += `<option value="${kab}">${kab}</option>`;
                    });
                } else {
                    kabupatenSelect.disabled = true;
                }
            });
        </script>

    </div>
</div>
@endsection
