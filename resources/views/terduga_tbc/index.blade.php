@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Register Terduga TBC (TBC.06)</h1>
    <a href="{{ route('terduga-tbc.create') }}" class="btn btn-warning btn-sm shadow-sm text-dark">
        <i class="fas fa-plus fa-sm text-dark-50"></i> Tambah Terduga
    </a>
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
                        <th width="120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->no_rm }}</td>
                        <td>{{ $row->nama_pasien }}</td>
                        <td>{{ $row->umur }} Thn</td>
                        <td>{{ \Carbon\Carbon::parse($row->tanggal_daftar)->format('d-m-Y') }}</td>
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
                                <a href="{{ route('terduga-tbc.edit', $row->id) }}" class="btn btn-warning btn-sm mr-2" title="Edit Data">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('terduga-tbc.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data terduga TBC: {{ $row->nama_pasien }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus Data">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection