@extends('adminlte::page')

@section('title', 'Edit Supplier')

@section('content_header')
    <h1>Edit Supplier</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Data Supplier</h3>
                </div>

                <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Supplier</label>
                            <input type="text" name="nama_supplier" value="{{ $supplier->nama_supplier }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Perusahaan</label>
                            <input type="text" name="perusahaan" value="{{ $supplier->perusahaan }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kontak</label>
                            <input type="text" name="kontak" value="{{ $supplier->kontak }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ $supplier->alamat }}</textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
