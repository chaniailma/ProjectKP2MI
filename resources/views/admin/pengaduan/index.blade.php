@extends('layouts.admin')


@section('content')

<h2>List Pengaduan</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama PMI</th>
            <th>NIK</th>
            <th>Negara</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pengaduans as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->nama_pmi }}</td>
            <td>{{ $p->nik }}</td>
            <td>{{ $p->negara_penempatan }}</td>
            <td>
    <a href="{{ route('admin.pengaduan.create', $p->id) }}"
       style="background-color: #2563eb; color: white; padding: 6px 12px; border-radius: 5px; text-decoration: none; margin-right: 5px;">
       Edit
    </a>

    <a href="{{ route('admin.pengaduan.show', $p->id) }}"
       style="background-color: #16a34a; color: white; padding: 6px 12px; border-radius: 5px; text-decoration: none;">
       Detail
    </a>
</td>

        </tr>
        @empty
        <tr>
            <td colspan="5" style="text-align:center">
                Data belum ada
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
