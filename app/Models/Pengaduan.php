<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    // Kalau nama tabel "pengaduans", BARIS INI BOLEH ADA
    protected $table = 'pengaduans';

  protected $fillable = [
    'nama_pmi',
    'nik',
    'gender',
    'status_marital',
    'jenjang_pendidikan',
    'nomor_paspor',
    'alamat_indonesia',
    'kabupaten_kota',
    'provinsi',
    'negara_penempatan',
    'alamat_penempatan',
    'p3mi',
    'nama_majikan',
    'tipe_terlapor',
    'nama_terlapor',
    'kontak_terlapor',
    'alamat_terlapor',
    'nama_pengadu',
    'alamat_pengadu',
    'telepon_pengadu',
    'relasi_pengadu',
    'media_pengadu',
    'tuntutan',
    'kategori_pengaduan',
    'penjelasan_pengaduan',
    'asal_pengaduan',
    'status_pengaduan',
    'tanggal_lapor',
    'unit_kerja',
    'dokumen_pendukung',
];

}
