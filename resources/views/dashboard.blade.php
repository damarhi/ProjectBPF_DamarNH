@extends('layouts.app_tiny')
@section('content')
<form method="GET" action="/filter">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow" style="height: auto;">
                <div class="card-body py-2">
                    <div class="row align-items-center">
                        <div class="form-group col-md-4 mb-0">
                            <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                            <input type="date" name="start_date" class="form-control">
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                            <input type="date" name="end_date" class="form-control">
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form><br>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <span class="h2 mb-0">Terjual :     {{ $transaksi->sum('jumlah_produk') }}</span>
                            <p class="small text-muted mb-0">Total Penjualan</p>
                        </div>
                        <div class="col-auto">
                            <span class="fe fe-32 fe-shopping-cart text-muted mb-0"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <span class="h2 mb-0">Rp. {{ number_format($transaksi->sum('total_harga')) }}</span>
                            <p class="small text-muted mb-0">Pendapatan Kotor</p>
                        </div>
                        <div class="col-auto">
                            <span class="fe fe-32 fe-shopping-bag text-muted mb-0"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <span class="h2 mb-0">RP.
                                {{ number_format(
                                    $transaksi->sum('total_harga') -
                                        $transaksi->sum(function ($item) {
                                            return $item->produk->harga_asli * $item->jumlah_produk;
                                        }),
                                ) }}</span>
                            <p class="small text-muted mb-0">Pendapatan Bersih</p>
                        </div>
                        <div class="col-auto">
                            <span class="fe fe-32 fe-credit-card text-muted mb-0"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                                <i class="fe fe-16 fe-activity text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col">
                            <p class="small text-muted mb-0">Jumlah Bookingan</p>
                            <span class="h4 mb-0">Ditunggu : {{ $booking->where('status', 'Tunggu')->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                                <i class="fe fe-16 fe-check text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col">
                            <p class="small text-muted mb-0">Jumlah Bookingan</p>
                            <span class="h4 mb-0">Disetujui : {{ $booking->where('status', 'Disetujui')->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                                <i class="fe fe-16 fe-x-circle text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col">
                            <p class="small text-muted mb-0">Jumlah Bookingan</p>
                            <span class="h4 mb-0">Ditolak : {{ $booking->where('status', 'Ditolak')->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                                <i class="fe fe-16 fe-user-check text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col">
                            <p class="small text-muted mb-0">Jumlah Bookingan</p>
                            <span class="h4 mb-0">Selesai : {{ $booking->where('status', 'Selesai')->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row"> <!-- Row untuk menampung kedua kolom -->
        <!-- Chart Produk -->
        <div class="col-md-6"> <!-- Kolom pertama -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="card-title">
                        <strong>Produk</strong>
                        <a class="float-right small text-muted" href="/produk">View all</a>
                    </div>
                    <div id="chart-box" style="max-width: 300px; margin: auto;">
                        <canvas id="donutChartWidget"></canvas>
                    </div>
                    <div class="col-md-12">
                        @foreach ($produk as $item)
                            <div class="row align-items-center my-3">
                                <div class="col">
                                    <strong>Gas LPG : {{ $item->jenis }}</strong>
                                    <div class="my-0 text-muted small">Stok : </div>
                                </div>
                                <div class="col-auto">
                                    <strong>{{ $item->stok_sekarang }}</strong>
                                </div>
                                <div class="col-3">
                                    <div class="progress" style="height: 4px;">
                                        @php
                                            // Asumsi stok maksimal adalah 100 untuk menghitung persentase
                                            $stok_maksimal = $item->stok_sekarang + $item->stok_terjual;
                                            $persentase = min(($item->stok_sekarang / $stok_maksimal) * 100, 100); // Membatasi nilai hingga 100%
                                        @endphp
                                        <div class="progress-bar" role="progressbar" style="width: {{ $persentase }}%;"
                                            aria-valuenow="{{ $item->stok_sekarang }}" aria-valuemin="0"
                                            aria-valuemax="{{ $stok_maksimal }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div> <!-- .col-md-12 -->

                </div>
            </div>
        </div>

        <!-- Chart Produk Terjual -->
        <div class="col-md-6"> <!-- Kolom kedua -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="card-title">
                        <strong>Produk Terjual</strong>
                        <a class="float-right small text-muted" href="/produk">View all</a>
                    </div>
                    <div id="chart-box" style="max-width: 300px; margin: auto;">
                        <canvas id="donutChartWidget2"></canvas>
                    </div>
                    <div class="col-md-12">
                        @foreach ($produk as $item)
                            <div class="row align-items-center my-3">
                                <div class="col">
                                    <strong>Gas LPG : {{ $item->jenis }}</strong>
                                    <div class="my-0 text-muted small">Stok : </div>
                                </div>
                                <div class="col-auto">
                                    <strong>{{ $item->stok_terjual }}</strong>
                                </div>
                                <div class="col-3">
                                    <div class="progress" style="height: 4px;">
                                        @php
                                            // Asumsi stok maksimal adalah 100 untuk menghitung persentase
                                            $stok_maksimal = $item->stok_sekarang;
                                            $persentase = min(($item->stok_terjual / $stok_maksimal) * 100, 100); // Membatasi nilai hingga 100%
                                        @endphp
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ $persentase }}%;"
                                            aria-valuenow="{{ $item->stok_terjual }}" aria-valuemin="0"
                                            aria-valuemax="{{ $stok_maksimal }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div> <!-- .col-md-12 -->
                </div>
            </div>
        </div>
    </div> <!-- .row -->

    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    <script>
        // Ambil data produk dari backend
        var produkData = @json($produk);

        // Data Chart Produk
        var labels = produkData.map(item => item.jenis);
        var dataStok = produkData.map(item => item.stok_sekarang);
        var dataTerjual = produkData.map(item => item.stok_terjual);

        var backgroundColors = ['#36A2EB', '#4BC0C0', '#9966FF', '#FFCE56', '#9AD0F5'];

        // Chart Produk
        var ctx1 = document.getElementById('donutChartWidget').getContext('2d');
        new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: dataStok,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    datalabels: {
                        color: '#fff',
                        font: {
                            size: 12,
                            weight: 'bold'
                        },
                        formatter: (value) => value
                    }
                },
                cutout: '40%',
            },
            plugins: [ChartDataLabels]
        });

        // Chart Produk Terjual
        var ctx2 = document.getElementById('donutChartWidget2').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: dataTerjual,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    datalabels: {
                        color: '#fff',
                        font: {
                            size: 12,
                            weight: 'bold'
                        },
                        formatter: (value) => value
                    }
                },
                cutout: '40%',
            },
            plugins: [ChartDataLabels]
        });
    </script>
@endsection
