<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Pdf;


class PengaduanController extends Controller
{
    public function index(Request $request)
{
    $query = Pengaduan::query();

    if ($request->search) {
        $query->where('nama_pmi', 'like', '%' . $request->search . '%');
    }

    $pengaduans = $query->latest()->get();

    return view('admin.pengaduan.index', compact('pengaduans'));
}
public function show($id)
{
    $pengaduan = Pengaduan::findOrFail($id);

    return view('admin.pengaduan.show', compact('pengaduan'));
}

    public function create(Request $request)
    {
        return view('admin.pengaduan.create');
    }
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

        Pengaduan::create($data);
        

        return redirect('/admin/pengaduan')
            ->with('success', 'Pengaduan berhasil dikirim. Terima kasih 🙏');
    }
    

    public function downloadPdf($id)
{
    $pengaduan = Pengaduan::findOrFail($id);

    $pdf = Pdf::loadView('admin.pengaduan.pdf', compact('pengaduan'))
              ->setPaper('A4', 'portrait');

    return $pdf->download('pengaduan-'.$pengaduan->id.'.pdf');
}
}
