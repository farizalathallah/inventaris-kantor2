@extends('adminlte::page')

@section('title', 'Barang Masuk')

@section('content_header')
    <h1><i class="fas fa-arrow-down text-success"></i> Barang Masuk</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-success">
            <div class="card-header"><h3 class="card-title">Form Input Masuk</h3></div>
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <input type="hidden" name="jenis" value="masuk">
                <div class="card-body">
                    <div class="form-group">
                        <label>Pilih Barang</label>
                        <select name="barang_id" class="form-control" required>
                            @foreach($barangs as $b)
                                <option value="{{ $b->id }}">{{ $b->nama_barang }} (Stok: {{ $b->stok }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" min="1" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" placeholder="Contoh: Stok dari Supplier"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-block">Simpan Barang Masuk</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card card-outline card-success">
            <div class="card-header"><h3 class="card-title">Riwayat Masuk</h3></div>
            <div class="card-body p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksis as $t)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d/m/Y') }}</td>
                            <td>{{ $t->barang->nama_barang }}</td>
                            <td><span class="badge badge-success">+ {{ $t->jumlah }}</span></td>
                            <td>{{ $t->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
