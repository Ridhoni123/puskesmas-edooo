@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pelayanan Ibu Hamil (K6)</h1>
    <a href="{{ route('ibu-hamil.create') }}" class="btn btn-primary btn-sm shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
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
                        <th>Tgl Pemeriksaan</th>
                        <th>Nama Ibu</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Nama Suami</th>
                        <th>PBI</th>
                        <th width="120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($row->tanggal_k6)->format('d-m-Y') }}</td>
                        <td>{{ $row->nama_ibu }}</td>
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->nama_suami }}</td>
                        <td>
                            <span class="badge {{ $row->is_pbi ? 'badge-success' : 'badge-secondary' }}">
                                {{ $row->is_pbi ? 'Ya' : 'Tidak' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('ibu-hamil.edit', $row->id) }}" class="btn btn-warning btn-sm mr-2" title="Edit Data">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('ibu-hamil.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ibu {{ $row->nama_ibu }}?')">
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