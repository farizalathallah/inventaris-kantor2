@extends('adminlte::page')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card card-outline {{ Request::is('*masuk*') ? 'card-success' : 'card-danger' }}">
                <div class="card-header">
                    <h3 class="card-title">Form Input Barang {{ Request::is('*masuk*') ? 'Masuk' : 'Keluar' }}</h3>
                </div>
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Pilih Barang</label>
                            <select name="barang_id" class="form-control select2" style="width: 100%;">
                                @foreach($barangs as $b)
                                    <option value="{{ $b->id }}">{{ $b->nama }} (Stok: {{ $b->stok }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" required min="1">
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn {{ Request::is('*masuk*') ? 'btn-success' : 'btn-danger' }} btn-block">
                            <i class="fas fa-save mr-1"></i> Simpan Transaksi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
