@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekapitulasi Data Puskesmas</h1>
        <div>
            <a href="{{ route('laporan.pdf') }}" class="btn btn-sm btn-danger shadow-sm">
                <i class="fas fa-file-pdf fa-sm text-white-50"></i> Export PDF
            </a>
            <a href="{{ route('laporan.excel') }}" class="btn btn-sm btn-success shadow-sm">
                <i class="fas fa-file-excel fa-sm text-white-50"></i> Export Excel
            </a>
            <button onclick="window.print()" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-print fa-sm text-white-50"></i> Print Browser
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Perbandingan Pasien</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar" style="height: 320px;">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Proporsi Data</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 250px;">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small font-weight-bold">
                        <span class="mr-2"><i class="fas fa-circle text-primary"></i> Ibu Hamil</span>
                        <span class="mr-2"><i class="fas fa-circle text-success"></i> Bersalin</span>
                        <span class="mr-2"><i class="fas fa-circle text-info"></i> Bayi</span>
                        <span class="mr-2"><i class="fas fa-circle text-danger"></i> HIV</span>
                        <span class="mr-2"><i class="fas fa-circle text-warning"></i> TBC</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h6 class="m-0 font-weight-bold text-primary">Detail Angka Statis Keseluruhan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="bg-gray-100 text-center">
                        <tr>
                            <th width="50">No</th>
                            <th>Kategori Laporan Kesehatan</th>
                            <th class="text-center">Jumlah Pasien</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Layanan Ibu Hamil (ANC)</td>
                            <td class="text-center font-weight-bold text-primary">{{ $total_ibu_hamil }}</td>
                            <td class="text-center"><span class="badge badge-primary">Aktif</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Layanan Ibu Bersalin</td>
                            <td class="text-center font-weight-bold text-success">{{ $total_ibu_bersalin }}</td>
                            <td class="text-center"><span class="badge badge-success">Aktif</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Kesehatan Bayi Baru Lahir</td>
                            <td class="text-center font-weight-bold text-info">{{ $total_bayi }}</td>
                            <td class="text-center"><span class="badge badge-info">Aktif</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Layanan HIV / AIDS</td>
                            <td class="text-center font-weight-bold text-danger">{{ $total_hiv }}</td>
                            <td class="text-center"><span class="badge badge-danger">Pantauan</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>Register Terduga TBC</td>
                            <td class="text-center font-weight-bold text-warning">{{ $total_tbc }}</td>
                            <td class="text-center"><span class="badge badge-warning">Pantauan</span></td>
                        </tr>
                    </tbody>
                    <tfoot class="bg-gray-100 font-weight-bold">
                        <tr>
                            <td colspan="2" class="text-right">TOTAL KESELURUHAN DATA</td>
                            <td class="text-center text-primary" style="font-size: 1.1rem;">
                                {{ $total_ibu_hamil + $total_ibu_bersalin + $total_bayi + $total_hiv + $total_tbc }}
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    var dataHamil = Number("{{ $total_ibu_hamil }}");
    var dataBersalin = Number("{{ $total_ibu_bersalin }}");
    var dataBayi = Number("{{ $total_bayi }}");
    var dataHiv = Number("{{ $total_hiv }}");
    var dataTbc = Number("{{ $total_tbc }}");

    // Bar Chart
    var ctxBar = document.getElementById("myBarChart");
    if (ctxBar) {
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ["Ibu Hamil", "Ibu Bersalin", "Bayi", "HIV", "TBC"],
                datasets: [{
                    label: "Jumlah Pasien",
                    backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc", "#e74a3b", "#f6c23e"],
                    hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf", "#be2617", "#dda20a"],
                    data: [dataHamil, dataBersalin, dataBayi, dataHiv, dataTbc],
                }],
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });
    }

    // Pie Chart
    var ctxPie = document.getElementById("myPieChart");
    if (ctxPie) {
        new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: ["Ibu Hamil", "Ibu Bersalin", "Bayi", "HIV", "TBC"],
                datasets: [{
                    data: [dataHamil, dataBersalin, dataBayi, dataHiv, dataTbc],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#e74a3b', '#f6c23e'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#be2617', '#dda20a'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                cutoutPercentage: 70,
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
            }
        });
    }
</script>
@endpush