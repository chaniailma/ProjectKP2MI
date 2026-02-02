<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';

    protected $fillable = [
        // INFORMASI UMUM
        'asal_pengaduan',
        'status_pengaduan',
        'tanggal_lapor',
        'unit_kerja',

        // DATA PMI
        'nama_pmi',
        'nik',
        'gender',
        'status_marital',
        'jenjang_pendidikan',
        'nomor_paspor',
        'alamat_indonesia',
        'kabupaten_kota',
        'provinsi',

        // DATA PENEMPATAN
        'negara_penempatan',
        'alamat_penempatan',
        'p3mi',
        'nama_majikan',

        // TERLAPOR
        'tipe_terlapor',
        'nama_terlapor',
        'kontak_terlapor',
        'alamat_terlapor',

        // PENGADU
        'nama_pengadu',
        'alamat_pengadu',
        'telepon_pengadu',
        'relasi_pengadu',

        // ⬇️ FIELD ASLI DI DB (MANUAL)
        'media_pengaduan',
        'klasifikasi_pengaduan',
        'deskripsi_permasalahan',

        'tuntutan',
    ];

    /* =====================================================
     | ACCESSOR (ALIAS) — INI KUNCI PERBAIKAN
     | Dipakai oleh SHOW & PDF
     ===================================================== */

    // media_pengadu -> media_pengaduan
    public function getMediaPengaduAttribute()
    {
        return $this->attributes['media_pengaduan'] ?? null;
    }

    // klasifikasi_pengaduan -> kategori_pengaduan
    public function getKlasifikasiPengaduanAttribute()
    {
        return $this->attributes['kategori_pengaduan'] ?? null;
    }

    // deskripsi_permasalahan -> deskripsi_pengaduan
    public function getDeskripsiPermasalahanAttribute()
    {
        return $this->attributes['deskripsi_pengaduan'] ?? null;
    }

    // RELASI ADMIN
    public function admin()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }
}
