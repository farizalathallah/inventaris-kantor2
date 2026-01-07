@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Supplier Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('supplier.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Perusahaan</label>
                            <input type="text" name="perusahaan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Kontak (No. HP/Telp)</label>
                            <input type="text" name="kontak" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan Supplier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection