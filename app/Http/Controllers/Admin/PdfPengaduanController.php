<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfPengaduanController extends Controller
{
    public function index()
    {
        return view('admin.pengaduan.pdf');

    }
    //
}
