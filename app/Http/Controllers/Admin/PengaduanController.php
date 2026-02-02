<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Klasifikasi;

class PengaduanController extends Controller
{
    /**
     * LIST DATA
     */
    public function index(Request $request)
    {
        $pengaduans = Pengaduan::when($request->search, function ($query) use ($request) {
                $query->where('nama_pmi', 'like', '%'.$request->search.'%')
                      ->orWhere('nik', 'like', '%'.$request->search.'%')
                      ->orWhere('negara_penempatan', 'like', '%'.$request->search.'%');
            })
            ->latest()
            ->paginate(5);

        return view('admin.pengaduan.index', compact('pengaduans'));
    }

   // FORM UBAH STATUS
public function editStatus($id)
{
    $pengaduan = Pengaduan::findOrFail($id);
    return view('admin.pengaduan.status', compact('pengaduan'));
}

// SIMPAN STATUS + ADMIN
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status_pengaduan' => 'required|in:belum,diproses,selesai',
    ]);

    $pengaduan = Pengaduan::findOrFail($id);

    $pengaduan->status_pengaduan = $request->status_pengaduan;
    $pengaduan->processed_by = Auth::id(); // siapa admin yang ubah
    $pengaduan->save();

    return redirect()->back()->with('success', 'Status pengaduan berhasil diperbarui.');
}

 public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

   public function store(Request $request)
{
    Pengaduan::create($request->except('_token'));

    return redirect()
        ->route('admin.pengaduan.index')
        ->with('success', 'Pengaduan berhasil disimpan');
}



public function create()
{
    $klasifikasi = Klasifikasi::all();
    return view('admin.pengaduan.create', compact('klasifikasi'));
}

    

    /**
     * FORM EDIT
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.edit', compact('pengaduan'));
    }

    /**
     * UPDATE DATA
     */
    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update($request->all());

        return redirect()
            ->route('admin.pengaduan.index')
            ->with('success', 'Pengaduan diperbarui');
    }

    /**
     * HAPUS
     */
    public function destroy($id)
    {
        Pengaduan::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    /**
     * CETAK PDF
     */
   public function downloadPdf($id)
{
    $pengaduan = Pengaduan::findOrFail($id);

    // admin yang download (akun login)
    $admin = Auth::user();

    $pdf = Pdf::loadView('admin.pengaduan.pdf', [
        'pengaduan' => $pengaduan,
        'admin' => $admin,
    ]);

    return $pdf->stream('pengaduan-'.$pengaduan->id.'.pdf');
}
    
}
