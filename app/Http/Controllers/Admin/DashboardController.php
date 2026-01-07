<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalPengaduan' => Pengaduan::count(),
            'negaraTerbanyak' => Pengaduan::select('negara_penempatan')
                ->groupBy('negara_penempatan')
                ->orderByRaw('COUNT(*) DESC')
                ->value('negara_penempatan'),
        ]);
    }
}
