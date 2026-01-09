@extends('adminlte::page')

@section('title', 'Barang Keluar')

@section('content_header')
    <h1><i class="fas fa-arrow-up text-danger"></i> Barang Keluar</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-danger">
            <div class="card-header"><h3 class="card-title">Form Input Keluar</h3></div>
            
            @if(session('error'))
                <div class="alert alert-danger m-2">{{ session('error') }}</div>
            @endif

            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <input type="hidden" name="jenis" value="keluar">
                <div class="card-body">
                    <div class="form-group">
                        <label>Pilih Barang</label>
                        <select name="barang_id" class="form-control" required>
                            @foreach($barangs as $b)
                                <option value="{{ $b->id }}">{{ $b->nama_barang }} (Sisa: {{ $b->stok }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Keluar</label>
                        <input type="number" name="jumlah" class="form-control" min="1" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Tujuan / Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger btn-block">Simpan Barang Keluar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card card-outline card-danger">
            <div class="card-header"><h3 class="card-title">Riwayat Keluar</h3></div>
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
                            <td><span class="badge badge-danger">- {{ $t->jumlah }}</span></td>
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
