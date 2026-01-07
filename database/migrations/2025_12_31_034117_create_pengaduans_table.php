<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
    $table->id();

    $table->string('nama_pmi');
    $table->enum('gender',['Laki-laki','Perempuan']);
    $table->string('status_marital');
    $table->string('jenjang_pendidikan');
    $table->string('nomor_paspor')->nullable();
    $table->string('nik',20);

    $table->text('alamat_indonesia');
    $table->string('kabupaten_kota');
    $table->string('provinsi');
    $table->string('negara_penempatan');
    $table->text('alamat_penempatan');

    $table->string('p3mi')->nullable();
    $table->string('nama_majikan');

    $table->string('tipe_terlapor');
    $table->string('nama_terlapor');
    $table->string('kontak_terlapor');
    $table->text('alamat_terlapor');

    $table->string('nama_pengadu');
    $table->text('alamat_pengadu');
    $table->string('telepon_pengadu');
    $table->string('relasi_pengadu');
    $table->string('media_pengadu');

    $table->string('tuntutan');
    $table->string('kategori_pengaduan');
    $table->longText('penjelasan_pengaduan');

    $table->date('tanggal_lapor')->default(DB::raw('CURRENT_DATE'));
    $table->string('status_pengaduan')->default('Klarifikasi');

    $table->timestamps();
});

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
