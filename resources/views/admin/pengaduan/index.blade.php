@extends('layouts.admin')

@section('title', 'List Pengaduan')

@section('content')

<style>
/* ===== CONTAINER ===== */
.card-box {
    background: #fff;
    border-radius: 14px;
    padding: 20px;
    box-shadow: 0 12px 35px rgba(0,0,0,0.06);
}

/* ===== HEADER ===== */
.header-flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
}

.header-flex h3 {
    font-weight: 600;
    color: #1f2937;
}

/* ===== ADD BUTTON ===== */
.btn-add {
    background: #22c55e;
    color: #fff;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.25s ease;
}

.btn-add:hover {
    background: #16a34a;
    transform: translateY(-2px);
}

/* ===== TABLE ===== */
.table-custom {
    width: 100%;
    border-collapse: collapse;
}

.table-custom th {
    background: #f8fafc;
    padding: 14px;
    text-align: left;
    font-size: 13px;
    color: #374151;
}

.table-custom td {
    padding: 14px;
    font-size: 14px;
}

.table-custom tbody tr:nth-child(odd) {
    background: #f3f4f6;
}

/* ===== HOVER EFFECT ===== */
.table-custom tbody tr:hover {
    background: #e5e7eb;
    transition: 0.2s;
}

/* ===== BUTTON ACTION ===== */
.btn-edit {
    background: #fbbf24;
    color: #000;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 12px;
    text-decoration: none;
    transition: 0.2s;
}

.btn-edit:hover {
    background: #f59e0b;
}

.btn-detail {
    background: #3b82f6;
    color: white;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 12px;
    text-decoration: none;
}

.btn-detail:hover {
    background: #2563eb;
}
</style>

<div class="container mt-4">
    <div class="card-box">

        <!-- HEADER -->
        <div class="header-flex">
            <h3>Data Pengaduan</h3>
            <a href="{{ route('admin.pengaduan.create') }}" class="btn-add">
                + Tambah Pengaduan
            </a>
        </div>

        <!-- TABLE -->
        <table class="table-custom">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama PMI</th>
                    <th>NIK</th>
                    <th>Negara</th>
                    <th width="20%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengaduans as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama_pmi }}</td>
                    <td>{{ $p->nik }}</td>
                    <td>{{ $p->negara_penempatan }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.pengaduan.edit', $p->id) }}" class="btn-edit">Edit</a>
                        <a href="{{ route('admin.pengaduan.show', $p->id) }}" class="btn-detail">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;color:#6b7280">
                        Data belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
