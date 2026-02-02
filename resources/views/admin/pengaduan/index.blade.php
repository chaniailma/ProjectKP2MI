@extends('layouts.admin')

@section('title', 'List Pengaduan')

@section('content')

<style>
/* ================= CARD ================= */
.card-box {
    background: #fff;
    border-radius: 14px;
    padding: 20px;
    box-shadow: 0 12px 35px rgba(0,0,0,0.06);
}

/* ================= HEADER ================= */
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

/* ================= SEARCH ================= */
.search-box input {
    padding: 8px 12px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 14px;
}

/* ================= BUTTON ================= */
.btn-add {
    background: #22c55e;
    color: #fff;
    padding: 8px 16px;
    border-radius: 8px;
    font-size: 14px;
    text-decoration: none;
}

.btn-add:hover { background: #16a34a; }

.btn-edit {
    background: #fbbf24;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 12px;
}

.btn-detail {
    background: #3b82f6;
    color: white;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 12px;
}

.btn-delete {
    background: #ef4444;
    color: white;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 12px;
}

/* ================= TABLE ================= */
.table-custom {
    width: 100%;
    border-collapse: collapse;
}

.table-custom th,
.table-custom td {
    border: 1px solid #e5e7eb;
    padding: 12px;
    font-size: 14px;
}

.table-custom th {
    background: #f8fafc;
    color: #374151;
}

.table-custom tbody tr:hover {
    background: #f3f4f6;
}

/* ================= PAGINATION BULAT ================= */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 25px;
}

.pagination-circle {
    display: flex;
    gap: 8px;
    list-style: none;
    padding: 0;
}

.pagination-circle li {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: white;
    border: 1px solid #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 500;
    color: #374151;
}

.pagination-circle li a {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: inherit;
}

.pagination-circle li:hover {
    background: #f3f4f6;
}

.pagination-circle li.active {
    background: #2563eb;
    color: white;
    border-color: #2563eb;
}

.pagination-circle li.disabled {
    color: #9ca3af;
    cursor: not-allowed;
}

.pagination-circle li.dots {
    border: none;
    background: transparent;
}
</style>

<div class="container mt-4">
    <div class="card-box">

        <!-- HEADER -->
        <div class="header-flex">
            <h3>Data Pengaduan</h3>

            <div class="flex gap-3 items-center">
                <!-- SEARCH -->
                <!-- SEARCH -->
            <form method="GET" action="{{ route('admin.pengaduan.index') }}"
                  class="relative w-72">

                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari pengaduan..."
                       class="w-full pl-10 pr-4 py-2 border rounded-md text-sm focus:ring-2 focus:ring-blue-500">

                <!-- ICON SEARCH -->
                <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
                </svg>
            </form>

                <a href="{{ route('admin.pengaduan.create') }}" class="btn-add">
                    + Tambah Pengaduan
                </a>
            </div>
        </div>

        <!-- TABLE -->
        <table class="table-custom">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama PMI</th>
                    <th>NIK</th>
                    <th>Negara</th>
                    <th width="25%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengaduans as $p)
                <tr>
                    <td>
                        {{ $loop->iteration + ($pengaduans->currentPage()-1)*$pengaduans->perPage() }}
                    </td>
                    <td>{{ $p->nama_pmi }}</td>
                    <td>{{ $p->nik }}</td>
                    <td>{{ $p->negara_penempatan }}</td>
                   <td class="text-center space-x-2">

    <a href="{{ route('admin.pengaduan.edit', $p->id) }}" class="btn-edit">
        Edit
    </a>

    <a href="{{ route('admin.pengaduan.show', $p->id) }}" class="btn-detail">
    Detail
</a>


    <button
        type="button"
        onclick="openConfirmModal('{{ route('admin.pengaduan.destroy', $p->id) }}')"
        class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">
        Hapus
    </button>

</td>

                        </form>
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

        <!-- PAGINATION -->
        <div class="pagination-wrapper">
            <ul class="pagination-circle">
                {{-- Previous --}}
                @if ($pengaduans->onFirstPage())
                    <li class="disabled">‹</li>
                @else
                    <li>
                        <a href="{{ $pengaduans->previousPageUrl() }}">‹</a>
                    </li>
                @endif

                {{-- Page Number --}}
                @foreach ($pengaduans->getUrlRange(1, $pengaduans->lastPage()) as $page => $url)
                    @if ($page == $pengaduans->currentPage())
                        <li class="active">{{ $page }}</li>
                    @else
                        <li>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($pengaduans->hasMorePages())
                    <li>
                        <a href="{{ $pengaduans->nextPageUrl() }}">›</a>
                    </li>
                @else
                    <li class="disabled">›</li>
                @endif
            </ul>
        </div>

    </div>
</div>

@endsection
