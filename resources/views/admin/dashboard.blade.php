@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    <!-- HEADER -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-600">
        <h1 class="text-2xl font-bold text-gray-800">
            Dashboard Pengaduan
        </h1>
        <p class="text-sm text-gray-500">
            Monitoring dan statistik pengaduan PMI
        </p>
    </div>

    <!-- FILTER -->
    <form method="GET"
          class="flex items-center gap-3 bg-white p-4 rounded-lg shadow justify-end">

        <select name="bulan" class="form-input w-36">
            <option value="">Bulan</option>
            @for($i=1;$i<=12;$i++)
                <option value="{{ $i }}" @selected(request('bulan')==$i)>
                    {{ date('F', mktime(0,0,0,$i,1)) }}
                </option>
            @endfor
        </select>

        <select name="tahun" class="form-input w-28">
            <option value="">Tahun</option>
            @for($y=date('Y');$y>=2022;$y--)
                <option value="{{ $y }}" @selected(request('tahun')==$y)>
                    {{ $y }}
                </option>
            @endfor
        </select>

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg text-sm font-medium">
            Terapkan
        </button>
    </form>

    <!-- SUMMARY -->
    @php
        $pb = $total ? round($baru/$total*100) : 0;
        $pp = $total ? round($proses/$total*100) : 0;
        $ps = $total ? round($selesai/$total*100) : 0;
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

        <!-- TOTAL -->
        <div class="bg-white rounded-lg shadow p-5">
            <p class="text-sm text-gray-500">Total Pengaduan</p>
            <h2 class="text-3xl font-bold mt-2 text-gray-800">
                {{ $total }}
            </h2>
        </div>

        <!-- BARU -->
        <div class="bg-red-50 rounded-lg shadow p-5">
            <p class="text-sm text-red-600">Pengaduan Baru</p>
            <h3 class="text-2xl font-bold mt-2 text-red-700">
                {{ $baru }}
            </h3>
            <p class="text-xs text-red-500">{{ $pb }}%</p>
        </div>

        <!-- PROSES -->
        <div class="bg-yellow-50 rounded-lg shadow p-5">
            <p class="text-sm text-yellow-600">Dalam Proses</p>
            <h3 class="text-2xl font-bold mt-2 text-yellow-700">
                {{ $proses }}
            </h3>
            <p class="text-xs text-yellow-500">{{ $pp }}%</p>
        </div>

        <!-- SELESAI -->
        <div class="bg-green-50 rounded-lg shadow p-5">
            <p class="text-sm text-green-600">Selesai</p>
            <h3 class="text-2xl font-bold mt-2 text-green-700">
                {{ $selesai }}
            </h3>
            <p class="text-xs text-green-500">{{ $ps }}%</p>
        </div>

    </div>

    <!-- PROVINSI -->
    <div class="bg-white rounded-lg shadow p-6">
        <h5 class="font-semibold mb-4 text-gray-700">
            📊 Pengaduan Berdasarkan Provinsi
        </h5>
        <canvas id="provinsiChart"></canvas>
    </div>

    <!-- KABUPATEN & NEGARA -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- KABUPATEN -->
        <div class="bg-white rounded-lg shadow p-6">
            <h5 class="font-semibold mb-4 text-gray-700">
                📍 Pengaduan Berdasarkan Kabupaten
            </h5>
            <canvas id="kabChart"></canvas>
        </div>

        <!-- NEGARA -->
        <div class="bg-white rounded-lg shadow p-6">
            <h5 class="font-semibold mb-4 text-gray-700">
                🌍 Pengaduan Berdasarkan Negara
            </h5>

            @foreach($negara as $n)
                @php
                    $persen = $total ? round($n->total/$total*100) : 0;
                    $kode = strtolower($n->negara_penempatan);
                @endphp

                <div class="mb-4">
                    <div class="flex justify-between items-center text-sm mb-1">
                        <div class="flex items-center gap-2">
                            <img src="https://flagcdn.com/w40/{{ $kode }}.png" class="h-4 rounded-sm">
                            <span class="font-medium">
                                {{ strtoupper($n->negara_penempatan) }}
                            </span>
                        </div>
                        <span class="font-semibold">{{ $n->total }}</span>
                    </div>

                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full"
                             style="width: {{ $persen }}%">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</div>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('provinsiChart'), {
    type: 'bar',
    data: {
        labels: {!! json_encode($provinsi->pluck('provinsi')) !!},
        datasets: [{
            data: {!! json_encode($provinsi->pluck('total')) !!},
            backgroundColor: '#2563eb'
        }]
    }
});

new Chart(document.getElementById('kabChart'), {
    type: 'bar',
    data: {
        labels: {!! json_encode($kabupaten->pluck('kabupaten_kota')) !!},
        datasets: [{
            data: {!! json_encode($kabupaten->pluck('total')) !!},
            backgroundColor: '#60a5fa'
        }]
    }
});
</script>

@endsection
