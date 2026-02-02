<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $query = Pengaduan::query();

        if ($bulan) {
            $query->whereMonth('created_at', $bulan);
        }

        if ($tahun) {
            $query->whereYear('created_at', $tahun);
        }

        $total   = $query->count();
        $baru    = (clone $query)->where('status_pengaduan', 'Terima Pengaduan')->count();
        $proses  = (clone $query)->where('status_pengaduan', 'Proses')->count();
        $selesai = (clone $query)->where('status_pengaduan', 'Selesai')->count();

        $provinsi = (clone $query)
            ->selectRaw('provinsi, COUNT(*) as total')
            ->groupBy('provinsi')
            ->orderByDesc('total')
            ->limit(6)
            ->get();

        $kabupaten = (clone $query)
            ->selectRaw('kabupaten_kota, COUNT(*) as total')
            ->groupBy('kabupaten_kota')
            ->orderByDesc('total')
            ->limit(6)
            ->get();

        $negara = (clone $query)
            ->selectRaw('negara_penempatan, COUNT(*) as total')
            ->groupBy('negara_penempatan')
            ->orderByDesc('total')
            ->limit(6)
            ->get();

        return view('admin.dashboard', compact(
            'total','baru','proses','selesai',
            'provinsi','kabupaten','negara',
            'bulan','tahun'
        ));
    }
}
