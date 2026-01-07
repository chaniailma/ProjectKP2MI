<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrPengaduanController extends Controller
{
    /**
     * Download QR Pengaduan Publik
     */
    public function download()
    {
        $qr = QrCode::format('png')
            ->size(500)
            ->margin(2)
            ->merge(public_path('images/kp2mi-logo.png'), 0.25, true)
            ->generate(route('pengaduan.create'));

        return response($qr)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="qr-pengaduan-kp2mi.png"');
    }
}
