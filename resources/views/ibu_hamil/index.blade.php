@extends('layouts.admin')

@section('content')
{{-- CSS DataTables --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pelayanan Ibu Hamil (K6)</h1>

    <div>
        {{-- TOMBOL CETAK LAPORAN RESMI (Memicu Modal) --}}
        <button type="button" class="btn btn-secondary btn-sm shadow-sm mr-2" data-toggle="modal" data-target="#modalCetak">
            <i class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan Resmi
        </button>

        {{-- TOMBOL TAMBAH DATA --}}
        <a href="{{ route('ibu-hamil.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pasien Ibu Hamil</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>Tgl Pemeriksaan</th>
                        <th>Nama Ibu</th>
                        <th>Tgl Lahir</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Suami</th>
                        <th>PBI</th>
                        <th>No HP</th>
                        <th>Keterangan</th>
                        <th width="120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td data-sort="{{ \Carbon\Carbon::parse($row->tanggal_k6)->format('Ymd') }}">
                            {{ \Carbon\Carbon::parse($row->tanggal_k6)->format('d-m-Y') }}
                        </td>
                        <td>{{ $row->nama_ibu }}</td>
                        <td>{{ \Carbon\Carbon::parse($row->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->nama_suami }}</td>
                        <td>
                            <span class="badge {{ $row->is_pbi ? 'badge-success' : 'badge-secondary' }}">
                                {{ $row->is_pbi ? 'Ya' : 'Tidak' }}
                            </span>
                        </td>
                        <td>{{ $row->no_hp }}</td>
                        <td>{{ $row->keterangan }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-info btn-sm mr-1" data-toggle="modal" data-target="#detailModal{{ $row->id }}" title="Lihat Detail"><i class="fas fa-eye"></i></button>
                                <a href="{{ route('ibu-hamil.edit', $row->id) }}" class="btn btn-warning btn-sm mr-1" title="Edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('ibu-hamil.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Hapus data?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>

                            {{-- Modal Detail Data Per Baris --}}
                            <div class="modal fade" id="detailModal{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info text-white">
                                            <h5 class="modal-title">Detail: {{ $row->nama_ibu }}</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th width="30%">Tgl Periksa</th>
                                                    <td>{{ \Carbon\Carbon::parse($row->tanggal_k6)->format('d F Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Ibu</th>
                                                    <td>{{ $row->nama_ibu }}</td>
                                                </tr>
                                                <tr>
                                                    <th>NIK</th>
                                                    <td>{{ $row->nik }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tempat, Tgl Lahir</th>
                                                    <td>{{ $row->tempat_lahir ?? '-' }}, {{ $row->tanggal_lahir ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td>{{ $row->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Suami</th>
                                                    <td>{{ $row->nama_suami }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Jaminan (PBI)</th>
                                                    <td>{{ $row->is_pbi ? 'BPJS PBI' : 'Mandiri/Umum' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>No HP</th>
                                                    <td>{{ $row->no_hp }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Keterangan</th>
                                                    <td>{{ $row->keterangan }}</td>
                                                </tr>
                                            </table>
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

{{-- MODAL PILIH PERIODE CETAK --}}
<div class="modal fade" id="modalCetak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-print"></i> Cetak Laporan Resmi</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- Form diarahkan ke route cetak dengan method GET agar parameter filter terbawa --}}
            <form action="{{ route('ibu-hamil.cetak') }}" method="GET" target="_blank">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Pilih Filter Data:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="filter" id="filterAll" value="all" checked>
                            <label class="form-check-label" for="filterAll">
                                Semua Data
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="filter" id="filterPeriode" value="periode">
                            <label class="form-check-label" for="filterPeriode">
                                Per Periode (Tanggal)
                            </label>
                        </div>
                    </div>

                    {{-- Input Tanggal (Default sembunyi) --}}
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
{{-- Script DataTables --}}
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
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                }
                // Tombol PDF & Print Table telah DIHAPUS sesuai permintaan
            ]
        });

        $('.dt-buttons').addClass('mb-3');

        // Logic Tampilkan/Sembunyikan Tanggal di Modal Cetak
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