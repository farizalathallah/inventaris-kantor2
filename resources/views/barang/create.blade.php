@extends('adminlte::page')

@section('title', 'Tambah Barang')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Barang</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Input Barang</h3>
            </div>

            <form method="POST" action="{{ route('barang.store') }}">
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control" name="kode_barang" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" required>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" name="kategori" required>
                    </div>

                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" class="form-control" name="stok" required>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="Contoh: 150000" required>
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

                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
