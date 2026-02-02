<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfPengaduanController extends Controller
{
    /**
     * Download / Preview PDF Pengaduan
     */
    public function downloadPdf($id)
    {
        // AMBIL DATA LENGKAP
        $pengaduan = Pengaduan::findOrFail($id);

        // ADMIN YANG LOGIN
        $admin = Auth::user();

        // GENERATE PDF
        $pdf = Pdf::loadView(
            'admin.pengaduan.pdf',
            [
                'pengaduan' => $pengaduan,
                'admin' => $admin,
            ]
        )->setPaper('A4', 'portrait');

        return $pdf->stream('pengaduan-' . $pengaduan->id . '.pdf');
    }
public function show($id)
{
    $pengaduan = Pengaduan::findOrFail($id);

    return view('admin.pengaduan.show', compact('pengaduan'));
}
    /**
     * Update Status Pengaduan
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_pengaduan' => 'required',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->status_pengaduan = $request->status_pengaduan;

        // SIMPAN ADMIN PERTAMA KALI MEMPROSES
        if ($pengaduan->processed_by === null) {
            $pengaduan->processed_by = Auth::id();
            $pengaduan->processed_at = now();
        }

        $pengaduan->save();

        return redirect()->back()->with('success', 'Status berhasil diubah');
    }
}
