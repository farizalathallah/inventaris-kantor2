@extends('adminlte::page')

@section('title', 'Edit Barang')

@section('content_header')
    <h1>Edit Barang</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Kode Barang</label>
                    <input class="form-control" name="kode_barang" value="{{ $barang->kode_barang }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Nama Barang</label>
                    <input class="form-control" name="nama_barang" value="{{ $barang->nama_barang }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Kategori</label>
                    <input class="form-control" name="kategori" value="{{ $barang->kategori }}" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label>Stok</label>
                    <input type="number" class="form-control" name="stok" value="{{ $barang->stok }}" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label>Harga</label>
                    <input class="form-control" name="harga" value="{{ $barang->harga }}" required>
                </div>
            </div>

            <div class="form-group">
                        <label>Sumber Dana</label>
                        <select class="form-control" name="sumber_dana" required>
                            <option value="">-- Pilih Sumber Dana --</option>
                            <option value="Operasional">Operasional</option>
                            <option value="Laba Perusahaan">Laba Perusahaan</option>
                            <option value="Modal ">Modal </option>
                            <option value="Sponsor ">Sponsor  </option>
                        </select>
                    </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
