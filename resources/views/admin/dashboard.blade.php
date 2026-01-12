@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4 bg-light min-vh-100">

    <!-- TITLE -->
    <div class="text-center mb-4">
        <h1 class="fw-bold">DASHBOARD PENGADUAN</h1>
        <p class="text-muted">Monitoring Pengaduan PMI</p>
    </div>

    <!-- FILTER -->
    <form method="GET" class="row justify-content-center g-3 mb-4">
        <div class="col-md-2">
            <select name="bulan" class="form-select">
                <option value="">Bulan</option>
                @for($i=1;$i<=12;$i++)
                    <option value="{{ $i }}">{{ date('F', mktime(0,0,0,$i,1)) }}</option>
                @endfor
            </select>
        </div>

        <div class="col-md-2">
            <select name="tahun" class="form-select">
                <option value="">Tahun</option>
                @for($y=date('Y');$y>=2022;$y--)
                    <option value="{{ $y }}">{{ $y }}</option>
                @endfor
            </select>
        </div>

        <div class="col-md-2 d-grid">
            <button class="btn btn-warning text-white">
                Submit
            </button>
        </div>
    </form>

    <!-- SUMMARY -->
    @php
        $pb = $total ? round($baru/$total*100) : 0;
        $pp = $total ? round($proses/$total*100) : 0;
        $ps = $total ? round($selesai/$total*100) : 0;
    @endphp

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <small class="text-muted">Jumlah Pengaduan</small>
                    <h2 class="fw-bold">{{ $total }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <small class="text-muted">Pengaduan Baru</small>
                    <h4 class="fw-bold text-danger">{{ $baru }} ({{ $pb }}%)</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <small class="text-muted">Dalam Proses</small>
                    <h4 class="fw-bold text-warning">{{ $proses }} ({{ $pp }}%)</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <small class="text-muted">Selesai</small>
                    <h4 class="fw-bold text-success">{{ $selesai }} ({{ $ps }}%)</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- PROVINSI -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-semibold mb-3">Pengaduan Berdasarkan Provinsi</h5>
            <canvas id="provinsiChart"></canvas>
        </div>
    </div>

    <!-- KABUPATEN & NEGARA -->
    <div class="row g-4">

        <!-- KABUPATEN -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3">Pengaduan Berdasarkan Kabupaten</h5>
                    <canvas id="kabChart"></canvas>
                </div>
            </div>
        </div>

        <!-- NEGARA -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3">Pengaduan Berdasarkan Negara</h5>

                    @foreach($negara as $n)
                        @php
                            $persen = $total ? round($n->total/$total*100) : 0;
                            $kode = strtolower($n->negara_penempatan);
                        @endphp

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="https://flagcdn.com/w40/{{ $kode }}.png" height="18">
                                    <small class="fw-semibold">{{ strtoupper($n->negara_penempatan) }}</small>
                                </div>
                                <small class="fw-bold">{{ $n->total }}</small>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-success" style="width: {{ $persen }}%"></div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('provinsiChart'), {
    type: 'bar',
    data: {
        labels: {!! json_encode($provinsi->pluck('provinsi')) !!},
        datasets: [{
            data: {!! json_encode($provinsi->pluck('total')) !!},
            backgroundColor: '#0d6efd'
        }]
    }
});

new Chart(document.getElementById('kabChart'), {
    type: 'bar',
    data: {
        labels: {!! json_encode($kabupaten->pluck('kabupaten_kota')) !!},
        datasets: [{
            data: {!! json_encode($kabupaten->pluck('total')) !!},
            backgroundColor: '#6ea8fe'
        }]
    }
});
</script>
@endsection
