@extends('layouts.admin')

@section('content')
{{-- CSS DataTables --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Lengkap Pelayanan Ibu Bersalin</h1>

    <div>
        {{-- TOMBOL CETAK DENGAN MODAL --}}
        <button type="button" class="btn btn-secondary btn-sm shadow-sm mr-2" data-toggle="modal" data-target="#modalCetak">
            <i class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan Resmi
        </button>

        {{-- TOMBOL TAMBAH DATA --}}
        <a href="{{ route('ibu-bersalin.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Ibu Bersalin</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th width="30px">No</th>
                        <th>Nama Ibu</th>
                        <th>NIK</th>
                        <th>Alamat Lengkap</th>
                        <th>Tgl Persalinan</th>
                        <th>Tempat</th>
                        <th>Metode</th>
                        <th>Penolong</th>
                        <th>Kondisi Ibu</th>
                        <th>Kondisi Bayi</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="font-weight-bold">{{ $row->nama_ibu }}</td>
                        <td>{{ $row->nik }}</td>
                        <td class="small">{{ $row->alamat }}</td>
                        <td class="text-center" data-sort="{{ \Carbon\Carbon::parse($row->tanggal_persalinan)->format('Ymd') }}">
                            {{ \Carbon\Carbon::parse($row->tanggal_persalinan)->format('d-m-Y') }}
                        </td>
                        <td>{{ $row->tempat_persalinan }}</td>
                        <td class="text-center">
                            <span class="badge badge-info">{{ $row->metode_persalinan }}</span>
                        </td>
                        <td>{{ $row->penolong_persalinan }}</td>
                        <td class="text-center">{{ $row->kondisi_ibu }}</td>
                        <td class="text-center">{{ $row->kondisi_bayi }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                {{-- Tombol Detail --}}
                                <button type="button" class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#detailModal{{ $row->id }}" title="Detail Lengkap">
                                    <i class="fas fa-eye"></i>
                                </button>
                                {{-- Tombol Edit --}}
                                <a href="{{ route('ibu-bersalin.edit', $row->id) }}" class="btn btn-warning btn-sm mr-2" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                {{-- Tombol Hapus --}}
                                <form action="{{ route('ibu-bersalin.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Hapus data ibu {{ $row->nama_ibu }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>

                            {{-- MODAL DETAIL --}}
                            <div class="modal fade" id="detailModal{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title">Detail: {{ $row->nama_ibu }}</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped table-bordered">
                                                <tr>
                                                    <th width="35%">Nama Ibu</th>
                                                    <td>{{ $row->nama_ibu }}</td>
                                                </tr>
                                                <tr>
                                                    <th>NIK</th>
                                                    <td>{{ $row->nik }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td>{{ $row->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tgl Persalinan</th>
                                                    <td>{{ \Carbon\Carbon::parse($row->tanggal_persalinan)->translatedFormat('l, d F Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tempat</th>
                                                    <td>{{ $row->tempat_persalinan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Metode</th>
                                                    <td>{{ $row->metode_persalinan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Penolong</th>
                                                    <td>{{ $row->penolong_persalinan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kondisi Ibu</th>
                                                    <td>{{ $row->kondisi_ibu }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kondisi Bayi</th>
                                                    <td>{{ $row->kondisi_bayi }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL DETAIL --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODAL FILTER CETAK --}}
<div class="modal fade" id="modalCetak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title"><i class="fas fa-print"></i> Cetak Laporan Resmi</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ibu-bersalin.cetak') }}" method="GET" target="_blank">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Pilih Filter Data:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="filter" id="filterAll" value="all" checked>
                            <label class="form-check-label" for="filterAll">Semua Data</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="filter" id="filterPeriode" value="periode">
                            <label class="form-check-label" for="filterPeriode">Per Periode (Tanggal Persalinan)</label>
                        </div>
                    </div>
                    <div id="dateRange" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Awal</label>
                                    <input type="date" name="tgl_awal" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Akhir</label>
                                    <input type="date" name="tgl_akhir" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Cetak PDF</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        if ($.fn.DataTable.isDataTable('#dataTable')) {
            $('#dataTable').DataTable().destroy();
        }

        $('#dataTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
            },
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> Export Excel',
                className: 'btn btn-success btn-sm',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                }
            }]
        });

        $('.dt-buttons').addClass('mb-3');

        // Logic Toggle Tanggal di Modal
        $('input[type=radio][name=filter]').change(function() {
            if (this.value == 'periode') {
                $('#dateRange').slideDown();
                $('input[name=tgl_awal]').prop('required', true);
                $('input[name=tgl_akhir]').prop('required', true);
            } else {
                $('#dateRange').slideUp();
                $('input[name=tgl_awal]').prop('required', false);
                $('input[name=tgl_akhir]').prop('required', false);
            }
        });
    });
</script>
@endpush