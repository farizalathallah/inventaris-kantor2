@extends('adminlte::page')

@section('title', 'Data Supplier')

@section('content_header')
    <h1>Data Supplier</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Supplier Inventaris</h3>
        <div class="card-tools">
            <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Supplier
            </a>
        </div>
    </div>
    
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Nama Supplier</th>
                        <th>Perusahaan</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th style="width: 100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($suppliers as $key => $s)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $s->nama_supplier }}</td>
                        <td><span class="badge badge-secondary">{{ $s->perusahaan }}</span></td>
                        <td>{{ $s->kontak }}</td>
                        <td>{{ $s->alamat }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('supplier.edit', $s->id) }}" class="btn btn-sm btn-warning mr-2 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('supplier.destroy', $s->id) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin ingin menghapus supplier ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data supplier.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
