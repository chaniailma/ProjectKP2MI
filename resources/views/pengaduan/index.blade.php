    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pengaduan PMI</title>
    @vite(['resources/css/app.css'])
</head>
<tbody>
    @forelse ($pengaduans as $p)
        <tr class="hover:bg-gray-50">
            <td class="border p-2 text-center">{{ $loop->iteration }}</td>
            <td class="border p-2">{{ $p->nama_pmi }}</td>
            <td class="border p-2">{{ $p->nik }}</td>
            <td class="border p-2">{{ $p->nama_pengadu }}</td>
            <td class="border p-2">
                {{ $p->created_at->format('d-m-Y') }}
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="border p-4 text-center text-gray-500">
                Belum ada data pengaduan
            </td>
        </tr>
    @endforelse
</tbody>

