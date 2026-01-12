<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * TAMPIL LIST PENGADUAN
     */
    public function index()
    {
        $pengaduans = Pengaduan::latest()->get();

        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    /**
     * FORM TAMBAH
     */
    public function create()
    {
        return view('admin.pengaduan.create');
    }

    /**
     * SIMPAN DATA
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pmi' => 'required|string|max:255',
            'nik' => 'required|string|max:50',
            'negara_penempatan' => 'nullable|string',
        ]);

        Pengaduan::create($data);

        return redirect()
            ->route('admin.pengaduan.index')
            ->with('success', 'Data pengaduan berhasil ditambahkan');
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

        $data = $request->validate([
            'nama_pmi' => 'required|string|max:255',
            'nik' => 'required|string|max:50',
            'negara_penempatan' => 'nullable|string',
        ]);

        $pengaduan->update($data);

        return redirect()
            ->route('admin.pengaduan.index')
            ->with('success', 'Data pengaduan berhasil diperbarui');
    }

    /**
     * DETAIL
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    /**
     * HAPUS
     */
    public function destroy($id)
    {
        Pengaduan::findOrFail($id)->delete();

        return redirect()
            ->route('admin.pengaduan.index')
            ->with('success', 'Data pengaduan berhasil dihapus');
    }
}
