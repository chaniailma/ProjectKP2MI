<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 


class PengaduanController extends Controller
{
    /**
     * Menampilkan daftar pengaduan (opsional publik)
     */
    public function index()
    {
        $pengaduans = Pengaduan::orderBy('created_at', 'desc')->get();
        return view('pengaduan.index', compact('pengaduans'));
    }

    /**
     * Form pengaduan publik
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Simpan pengaduan (PUBLIK)
     */
   public function store(Request $request)
{
    $data = $request->validate([
        'nama_pmi' => 'required|string|max:255',
        'nik' => 'required|string|max:50',
        'gender' => 'nullable|string',
        'status_marital' => 'nullable|string',
        'jenjang_pendidikan' => 'nullable|string',
        'nomor_paspor' => 'nullable|string',
        'alamat_indonesia' => 'nullable|string',
        'kabupaten_kota' => 'nullable|string',
        'provinsi' => 'nullable|string',
        'negara_penempatan' => 'nullable|string',
        'alamat_penempatan' => 'nullable|string',
        'p3mi' => 'nullable|string',
        'nama_majikan' => 'nullable|string',
        'tipe_terlapor' => 'nullable|string',
        'nama_terlapor' => 'nullable|string',
        'kontak_terlapor' => 'nullable|string',
        'alamat_terlapor' => 'nullable|string',
        'nama_pengadu' => 'nullable|string',
        'alamat_pengadu' => 'nullable|string',
        'telepon_pengadu' => 'nullable|string',
        'relasi_pengadu' => 'nullable|string',
        'media_pengadu' => 'nullable|string',
        'tuntutan' => 'nullable|string',
        'kategori_pengaduan' => 'nullable|string',
        'penjelasan_pengaduan' => 'nullable|string',
    ]);

    // ===============================
    // SET OTOMATIS (TIDAK DARI FORM)
    // ===============================
    $data['asal_pengaduan']   = 'Front Office';
    $data['status_pengaduan'] = 'Terima Pengaduan';
    $data['tanggal_lapor']    = now()->format('Y-m-d');
    $data['unit_kerja']       = 'Direktorat Pelayanan Pengaduan';

    Pengaduan::create($data);

    return redirect('/')
        ->with('success', 'Pengaduan berhasil dikirim dan sedang diproses 🙏');
}

    /**
     * Detail pengaduan (opsional publik/admin)
     */
   
}
