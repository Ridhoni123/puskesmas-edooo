@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pelayanan Bayi Baru Lahir (KN 3)</h1>
    <a href="{{ route('bayi-baru-lahir.create') }}" class="btn btn-info btn-sm shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
    </a>
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
                        <th>Tgl Lahir</th>
                        <th>Orang Tua</th>
                        <th>Alamat</th>
                        <th>PBI</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="text-center">{{ \Carbon\Carbon::parse($row->tanggal_kn3)->format('d/m/Y') }}</td>
                        <td class="font-weight-bold">{{ $row->nama_bayi }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($row->tanggal_lahir)->format('d/m/Y') }}</td>
                        <td>{{ $row->nama_orang_tua }}</td>
                        <td class="small">{{ $row->alamat }}</td>
                        <td class="text-center">
                            <span class="badge {{ $row->is_pbi ? 'badge-success' : 'badge-secondary' }}">
                                {{ $row->is_pbi ? 'Ya' : 'Tidak' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('bayi-baru-lahir.edit', $row->id) }}" class="btn btn-warning btn-sm mr-2" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('bayi-baru-lahir.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Hapus data bayi {{ $row->nama_bayi }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>
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