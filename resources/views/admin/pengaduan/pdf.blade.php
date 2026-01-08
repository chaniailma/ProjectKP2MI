<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pengaduan</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            line-height: 1.5;
        }

        h3 {
            text-align: center;
            margin: 20px 0;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 4px 2px;
            vertical-align: top;
        }

        td.label {
            width: 30%;
        }

        td.separator {
            width: 3%;
        }

        .box {
            border: 1px solid #000;
            padding: 10px;
            min-height: 120px;
        }

        .ttd {
            width: 100%;
            margin-top: 40px;
        }

        .ttd td {
            text-align: center;
            padding-top: 60px;
        }
    </style>
</head>
<body>

    <!-- ================= KOP SURAT DENGAN LOGO ================= -->
    <table width="100%" style="border-bottom:2px solid #000; padding-bottom:10px; margin-bottom:20px;">
        <tr>
            <td width="15%" align="center">
                <img src="{{ public_path('images/logo-bp2mi.png') }}" width="80">
            </td>
            <td width="85%" align="center">
                <div style="font-size:14px; font-weight:bold;">
                    KEMENTERIAN PELINDUNGAN PEKERJA MIGRAN INDONESIA
                </div>
                <div style="font-size:13px; font-weight:bold;">
                    BADAN PELINDUNGAN PEKERJA MIGRAN INDONESIA
                </div>
                <div style="font-size:11px; font-weight:bold;">
                    DIREKTORAT JENDERAL PELINDUNGAN
                </div>
                <div style="font-size:10px;">
                    Jl. MT. Haryono Kav. 52 Cikoko, Jakarta Selatan 12770
                </div>
                <div style="font-size:10px;">
                    Telp. (021) 79197321 | Web: www.bp2mi.go.id
                </div>
            </td>
        </tr>
    </table>
    <!-- ========================================================= -->

    <!-- JUDUL -->
    <h3>DETAIL PENGADUAN</h3>

    <!-- DATA PENGADUAN -->
    <table>
        <tr>
            <td class="label">Nama Penginput</td>
            <td class="separator">:</td>
            <td>{{ $pengaduan->nama_penginput ?? '-' }}</td>
        </tr>
        <tr>
            <td>No Pengaduan</td>
            <td>:</td>
            <td>{{ $pengaduan->no_pengaduan ?? $pengaduan->id }}</td>
        </tr>
        <tr>
            <td>Nama PMI</td>
            <td>:</td>
            <td>{{ $pengaduan->nama_pmi ?? '-' }}</td>
        </tr>
        <tr>
            <td>Nama Terlapor</td>
            <td>:</td>
            <td>{{ $pengaduan->nama_terlapor ?? '-' }}</td>
        </tr>
        <tr>
            <td>Kontak Terlapor</td>
            <td>:</td>
            <td>{{ $pengaduan->kontak_terlapor ?? '-' }}</td>
        </tr>
        <tr>
            <td>Alamat Terlapor</td>
            <td>:</td>
            <td>{{ $pengaduan->alamat_terlapor ?? '-' }}</td>
        </tr>
        <tr>
            <td>Nama Pengadu</td>
            <td>:</td>
            <td>{{ $pengaduan->nama_pengadu ?? '-' }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $pengaduan->nik ?? '-' }}</td>
        </tr>
        <tr>
            <td>Alamat Pengadu</td>
            <td>:</td>
            <td>{{ $pengaduan->alamat_pengadu ?? '-' }}</td>
        </tr>
        <tr>
            <td>Telepon Pengadu</td>
            <td>:</td>
            <td>{{ $pengaduan->telepon_pengadu ?? '-' }}</td>
        </tr>
        <tr>
            <td>Negara Penempatan</td>
            <td>:</td>
            <td>{{ $pengaduan->negara_penempatan ?? '-' }}</td>
        </tr>
        <tr>
            <td>Kategori Pengaduan</td>
            <td>:</td>
            <td>{{ $pengaduan->kategori ?? '-' }}</td>
        </tr>
        <tr>
            <td>Status Pengaduan</td>
            <td>:</td>
            <td>{{ $pengaduan->status ?? '-' }}</td>
        </tr>
    </table>

    <br>

    <!-- PENJELASAN -->
    <strong>PENJELASAN PENGADUAN :</strong>
    <div class="box">
        {{ $pengaduan->isi_pengaduan ?? '-' }}
    </div>

    <!-- TANDA TANGAN -->
    <table class="ttd">
        <tr>
            <td>
                ( {{ $pengaduan->nama_pengadu ?? 'Nama Pengadu' }} )
            </td>
            <td>
                ( {{ $pengaduan->nama_penginput ?? 'Nama Penginput' }} )
            </td>
        </tr>
    </table>

</body>
</html>
