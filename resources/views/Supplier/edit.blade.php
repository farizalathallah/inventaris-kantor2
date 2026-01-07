@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"><h4>Edit Supplier</h4></div>
        <div class="card-body">
            <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="mb-3">
                    <label>Nama Supplier</label>
                    <input type="text" name="nama_supplier" value="{{ $supplier->nama_supplier }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Perusahaan</label>
                    <input type="text" name="perusahaan" value="{{ $supplier->perusahaan }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Kontak</label>
                    <input type="text" name="kontak" value="{{ $supplier->kontak }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ $supplier->alamat }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection