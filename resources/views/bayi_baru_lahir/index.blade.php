@extends('layouts.admin')

@section('content')
{{-- CSS DataTables --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pelayanan Bayi Baru Lahir (KN 3)</h1>

    <div>
        {{-- TOMBOL CETAK DENGAN MODAL --}}
        <button type="button" class="btn btn-secondary btn-sm shadow-sm mr-2" data-toggle="modal" data-target="#modalCetak">
            <i class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan Resmi
        </button>

        {{-- TOMBOL TAMBAH DATA --}}
        <a href="{{ route('bayi-baru-lahir.create') }}" class="btn btn-info btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show border-left-success" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th>Tgl Pelayanan</th>
                        <th>Nama Bayi</th>
                        <th>Tempat/Tgl Lahir</th>
                        <th>Orang Tua</th>
                        <th>Kondisi</th>
                        <th>PBI</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="text-center" data-sort="{{ \Carbon\Carbon::parse($row->tanggal_kn3)->format('Ymd') }}">
                            {{ \Carbon\Carbon::parse($row->tanggal_kn3)->format('d/m/Y') }}
                        </td>
                        <td class="font-weight-bold">{{ $row->nama_bayi }}</td>
                        <td class="text-center">
                            <small>{{ $row->tempat_lahir ?? '-' }}</small><br>
                            {{ \Carbon\Carbon::parse($row->tanggal_lahir)->format('d/m/Y') }}
                        </td>
                        <td>{{ $row->nama_orang_tua }}</td>
                        <td class="text-center">
                            @if($row->kondisi_kesehatan == 'Sehat')
                            <span class="badge badge-success px-2">Sehat</span>
                            @elseif($row->kondisi_kesehatan == 'Sakit')
                            <span class="badge badge-danger px-2">Sakit</span>
                            @else
                            <span class="badge badge-warning px-2">{{ $row->kondisi_kesehatan ?? '-' }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="badge {{ $row->is_pbi ? 'badge-success' : 'badge-secondary' }}">
                                {{ $row->is_pbi ? 'Ya' : 'Tidak' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#detailModal{{ $row->id }}" title="Detail Lengkap">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <a href="{{ route('bayi-baru-lahir.edit', $row->id) }}" class="btn btn-warning btn-sm mr-2" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('bayi-baru-lahir.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Hapus data bayi {{ $row->nama_bayi }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>

                            {{-- MODAL DETAIL --}}
                            <div class="modal fade" id="detailModal{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info text-white">
                                            <h5 class="modal-title">Detail Bayi: {{ $row->nama_bayi }}</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table table-sm table-borderless">
                                                        <tr>
                                                            <th width="45%">Tgl Pelayanan</th>
                                                            <td>: {{ \Carbon\Carbon::parse($row->tanggal_kn3)->translatedFormat('d F Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Bayi</th>
                                                            <td>: {{ $row->nama_bayi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tempat Lahir</th>
                                                            <td>: {{ $row->tempat_lahir ?? '-' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tgl Lahir</th>
                                                            <td>: {{ \Carbon\Carbon::parse($row->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>NIK</th>
                                                            <td>: {{ $row->nik ?? '-' }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table-sm table-borderless">
                                                        <tr>
                                                            <th width="45%">Orang Tua</th>
                                                            <td>: {{ $row->nama_orang_tua }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Berat Badan</th>
                                                            <td>: {{ $row->berat_badan ?? '-' }} gram</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Panjang Badan</th>
                                                            <td>: {{ $row->panjang_badan ?? '-' }} cm</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Kondisi</th>
                                                            <td>: <span class="font-weight-bold">{{ $row->kondisi_kesehatan ?? '-' }}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Status PBI</th>
                                                            <td>: {{ $row->is_pbi ? 'Ya (PBI)' : 'Tidak' }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <hr>
                                            <label class="font-weight-bold">Alamat:</label>
                                            <p>{{ $row->alamat }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            <form action="{{ route('bayi-baru-lahir.cetak') }}" method="GET" target="_blank">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Pilih Filter Data:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="filter" id="filterAll" value="all" checked>
                            <label class="form-check-label" for="filterAll">Semua Data</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="filter" id="filterPeriode" value="periode">
                            <label class="form-check-label" for="filterPeriode">Per Periode (Tgl Pelayanan)</label>
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
{{-- Scripts DataTables --}}
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
                    // Export kolom: Tgl Pelayanan, Nama, Tgl Lahir, Ortu, Alamat, Kondisi, PBI
                    columns: [0, 1, 2, 3, 4, 5]
                }
            }]
        });

        $('.dt-buttons').addClass('mb-3');

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