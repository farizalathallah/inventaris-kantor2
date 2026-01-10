@extends('adminlte::page')

@section('title', 'Barang Masuk')

@section('content_header')
    <h1>Input Barang Masuk</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card card-outline card-success shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Form Stok Masuk</h3>
                </div>
                
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="jenis" value="masuk">

                    <div class="card-body">
                        <div class="form-group">
                            <label>Pilih Barang</label>
                            <select name="barang_id" class="form-control select2 @error('barang_id') is-invalid @enderror" style="width: 100%;">
                                <option value="" selected disabled>-- Pilih Barang --</option>
                                @foreach($barangs as $b)
                                    <option value="{{ $b->id }}">
                                        {{ $b->nama }} (Stok: {{ $b->stok }})
                                    </option>
                                @endforeach
                            </select>
                            @error('barang_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>Jumlah Masuk</label>
                            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" placeholder="0" min="1">
                            @error('jumlah') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block">
                            <i class="fas fa-plus-circle mr-1"></i> Simpan Barang Masuk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.0.0/dist/select2-bootstrap4.min.css">
    <style>
        .select2-container .select2-selection--single { height: 38px !important; }
        .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered { line-height: 38px !important; }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap4',
                placeholder: "-- Pilih Barang --"
            });
        });
    </script>
@stop
