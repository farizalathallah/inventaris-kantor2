@extends('adminlte::page')

@section('title', 'Tambah Supplier')

@section('content_header')
    <h1>Tambah Supplier Baru</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Input Supplier</h3>
                </div>
                
                <form action="{{ route('supplier.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control" placeholder="Masukkan Nama Supplier" required>
                        </div>
                        <div class="form-group">
                            <label>Perusahaan</label>
                            <input type="text" name="perusahaan" class="form-control" placeholder="Masukkan Nama Perusahaan" required>
                        </div>
                        <div class="form-group">
                            <label>Kontak (No. HP/Telp)</label>
                            <input type="text" name="kontak" class="form-control" placeholder="Contoh: 0812345xxx" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap" required></textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success float-right">Simpan Supplier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
