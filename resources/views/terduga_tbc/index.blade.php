@extends('layouts.admin')

@section('content')
{{-- CSS DataTables --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Register Terduga TBC (TBC.06)</h1>

    <div>
        {{-- TOMBOL CETAK DENGAN MODAL --}}
        <button type="button" class="btn btn-secondary btn-sm shadow-sm mr-2" data-toggle="modal" data-target="#modalCetak">
            <i class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan Resmi
        </button>

        {{-- TOMBOL TAMBAH DATA --}}
        <a href="{{ route('terduga-tbc.create') }}" class="btn btn-warning btn-sm shadow-sm text-dark">
            <i class="fas fa-plus fa-sm text-dark-50"></i> Tambah Terduga
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
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>No. RM</th>
                        <th>Nama Lengkap</th>
                        <th>Umur</th>
                        <th>Tgl Daftar</th>
                        <th>Hasil TCM</th>
                        <th>Tindak Lanjut</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->no_rm }}</td>
                        <td>{{ $row->nama_pasien }}</td>
                        <td>{{ $row->umur }} Thn</td>
                        <td data-sort="{{ \Carbon\Carbon::parse($row->tanggal_daftar)->format('Ymd') }}">
                            {{ \Carbon\Carbon::parse($row->tanggal_daftar)->format('d-m-Y') }}
                        </td>
                        <td>
                            <span class="font-weight-bold {{ $row->hasil_tcm == 'Rif Sen' ? 'text-danger' : '' }}">
                                {{ $row->hasil_tcm }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $row->tindak_lanjut == 'Akan Diobati/Dirujuk' ? 'badge-danger' : 'badge-info' }}">
                                {{ $row->tindak_lanjut }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                {{-- 1. TOMBOL DETAIL --}}
                                <button type="button" class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#detailModal{{ $row->id }}" title="Detail Lengkap">
                                    <i class="fas fa-eye"></i>
                                </button>

                                {{-- 2. TOMBOL EDIT --}}
                                <a href="{{ route('terduga-tbc.edit', $row->id) }}" class="btn btn-warning btn-sm mr-2" title="Edit Data">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- 3. TOMBOL HAPUS --}}
                                <form action="{{ route('terduga-tbc.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data terduga TBC: {{ $row->nama_pasien }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus Data">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>

                            {{-- MODAL DETAIL --}}
                            <div class="modal fade" id="detailModal{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning text-dark">
                                            <h5 class="modal-title font-weight-bold">Detail Terduga TBC: {{ $row->nama_pasien }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <tr>
                                                        <th width="35%">No. Identitas Sediaan</th>
                                                        <td>{{ $row->no_sediaan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>No. Rekam Medis</th>
                                                        <td>{{ $row->no_rm }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Didaftar</th>
                                                        <td>{{ \Carbon\Carbon::parse($row->tanggal_daftar)->translatedFormat('l, d F Y') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Lengkap</th>
                                                        <td>{{ $row->nama_pasien }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>NIK</th>
                                                        <td>{{ $row->nik }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Kelamin</th>
                                                        <td>{{ $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Umur</th>
                                                        <td>{{ $row->umur }} Tahun</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat Lengkap</th>
                                                        <td>{{ $row->alamat_lengkap }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Hasil Pemeriksaan TCM</th>
                                                        <td><span class="font-weight-bold {{ $row->hasil_tcm == 'Rif Sen' ? 'text-danger' : 'text-success' }}">{{ $row->hasil_tcm }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status HIV</th>
                                                        <td>{{ $row->status_hiv }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tindak Lanjut</th>
                                                        <td><span class="badge {{ $row->tindak_lanjut == 'Akan Diobati/Dirujuk' ? 'badge-danger' : 'badge-success' }}">{{ $row->tindak_lanjut }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Terakhir Diupdate</th>
                                                        <td>{{ $row->updated_at ? $row->updated_at->diffForHumans() : '-' }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <a href="{{ route('terduga-tbc.edit', $row->id) }}" class="btn btn-warning">Edit Data</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- AKHIR MODAL --}}
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
            {{-- Form Filter --}}
            <form action="{{ route('terduga-tbc.cetak') }}" method="GET" target="_blank">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Pilih Filter Data:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="filter" id="filterAll" value="all" checked>
                            <label class="form-check-label" for="filterAll">Semua Data</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="filter" id="filterPeriode" value="periode">
                            <label class="form-check-label" for="filterPeriode">Per Periode (Tgl Daftar)</label>
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
                    columns: [0, 1, 2, 3, 4, 5]
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