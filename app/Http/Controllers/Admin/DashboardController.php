<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

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

        $total = $query->count();

        // STATUS: 0=Baru, 1=Proses, 2=Selesai
        $baru    = (clone $query)->where('status_pengaduan', 0)->count();
        $proses  = (clone $query)->where('status_pengaduan', 1)->count();
        $selesai = (clone $query)->where('status_pengaduan', 2)->count();

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
            'total',
            'baru',
            'proses',
            'selesai',
            'provinsi',
            'kabupaten',
            'negara',
            'bulan',
            'tahun'
        ));
    }
}
