<x-guest-layout>

    <div class="max-w-4xl mx-auto py-8">

        <h2 class="font-semibold text-2xl text-gray-800 mb-6">
            Form Pengaduan PMI
        </h2>

        <form method="POST" action="{{ route('pengaduan.store') }}">
            @csrf

            <!-- DATA PMI -->
            <h4 class="font-bold mb-2">Data PMI</h4>
            <input type="text" name="nama_pmi" placeholder="Nama PMI" class="w-full border rounded p-2 mb-2">
            <input type="text" name="nik" placeholder="NIK" class="w-full border rounded p-2 mb-2">

            <select name="gender" class="w-full border rounded p-2 mb-2">
                <option value="">-- Pilih Gender --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <input type="text" name="status_marital" placeholder="Status Marital" class="w-full border rounded p-2 mb-2">
            <input type="text" name="jenjang_pendidikan" placeholder="Jenjang Pendidikan" class="w-full border rounded p-2 mb-2">
            <input type="text" name="nomor_paspor" placeholder="Nomor Paspor" class="w-full border rounded p-2 mb-2">
            <textarea name="alamat_indonesia" placeholder="Alamat Indonesia" class="w-full border rounded p-2 mb-2"></textarea>

            <!-- DATA PENEMPATAN -->
            <h4 class="font-bold mt-4 mb-2">Data Penempatan</h4>
            <input type="text" name="kabupaten_kota" placeholder="Kab/Kota" class="w-full border rounded p-2 mb-2">
            <input type="text" name="provinsi" placeholder="Provinsi" class="w-full border rounded p-2 mb-2">
            <input type="text" name="negara_penempatan" placeholder="Negara Penempatan" class="w-full border rounded p-2 mb-2">
            <textarea name="alamat_penempatan" placeholder="Alamat Penempatan" class="w-full border rounded p-2 mb-2"></textarea>

            <!-- PEKERJAAN -->
            <h4 class="font-bold mt-4 mb-2">Pekerjaan</h4>
            <input type="text" name="p3mi" placeholder="P3MI" class="w-full border rounded p-2 mb-2">
            <input type="text" name="nama_majikan" placeholder="Nama Majikan" class="w-full border rounded p-2 mb-2">

            <!-- TERLAPOR -->
            <h4 class="font-bold mt-4 mb-2">Terlapor</h4>
            <input type="text" name="tipe_terlapor" placeholder="Tipe Terlapor" class="w-full border rounded p-2 mb-2">
            <input type="text" name="nama_terlapor" placeholder="Nama Terlapor" class="w-full border rounded p-2 mb-2">
            <input type="text" name="kontak_terlapor" placeholder="Kontak Terlapor" class="w-full border rounded p-2 mb-2">
            <textarea name="alamat_terlapor" placeholder="Alamat Terlapor" class="w-full border rounded p-2 mb-2"></textarea>

            <!-- PENGADU -->
            <h4 class="font-bold mt-4 mb-2">Data Pengadu</h4>
            <input type="text" name="nama_pengadu" placeholder="Nama Pengadu" class="w-full border rounded p-2 mb-2">
            <textarea name="alamat_pengadu" placeholder="Alamat Pengadu" class="w-full border rounded p-2 mb-2"></textarea>
            <input type="text" name="telepon_pengadu" placeholder="Telepon Pengadu" class="w-full border rounded p-2 mb-2">
            <input type="text" name="relasi_pengadu" placeholder="Relasi Pengadu" class="w-full border rounded p-2 mb-2">
            <input type="text" name="media_pengadu" placeholder="Media Pengadu" class="w-full border rounded p-2 mb-2">

            <!-- PENGADUAN -->
            <h4 class="font-bold mt-4 mb-2">Pengaduan</h4>
            <input type="text" name="tuntutan" placeholder="Tuntutan" class="w-full border rounded p-2 mb-2">
            <input type="text" name="kategori_pengaduan" placeholder="Kategori Pengaduan" class="w-full border rounded p-2 mb-2">
            <textarea name="penjelasan_pengaduan" placeholder="Penjelasan Pengaduan" class="w-full border rounded p-2 mb-4"></textarea>

            
            <div class="flex gap-4 mt-6">
    <a href="{{ url('/') }}"
       class="px-6 py-2 border border-gray-400 rounded text-gray-700 hover:bg-gray-100">
        ← Kembali
    </a>

    <button type="submit"
        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
        Kirim Pengaduan
    </button>
</div>


        </form>
    </div>

</x-guest-layout>
