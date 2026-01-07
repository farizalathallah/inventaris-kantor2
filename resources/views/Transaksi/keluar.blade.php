@extends('adminlte::page')

@section('title', 'Barang Keluar')

@section('content_header')
    <h1><i class="fas fa-arrow-up text-danger"></i> Barang Keluar</h1>
@endsection

@section('content')
<div class="row">
    {{-- Form Input Barang Keluar --}}
    <div class="col-md-4">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Form Input Keluar</h3>
            </div>
            
            {{-- Menampilkan Error Jika Stok Kurang --}}
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible m-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-ban"></i> {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                {{-- Hidden input untuk menandakan ini jenis transaksi KELUAR --}}
                <input type="hidden" name="jenis" value="keluar">
                
                <div class="card-body">
                    <div class="form-group">
                        <label>Pilih Barang</label>
                        <select name="barang_id" class="form-control select2" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach($barangs as $b)
                                <option value="{{ $b->id }}">{{ $b->nama_barang }} (Sisa Stok: {{ $b->stok }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Keluar</label>
                        <input type="number" name="jumlah" class="form-control" min="1" placeholder="Masukkan jumlah..." required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Keterangan / Tujuan</label>
                        <textarea name="keterangan" class="form-control" rows="3" placeholder="Contoh: Distribusi ke Divisi IT"></textarea>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-save"></i> Simpan Barang Keluar
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabel Riwayat Barang Keluar --}}
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Riwayat Barang Keluar</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksis as $t)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d/m/Y') }}</td>
                            <td>{{ $t->barang->nama_barang }}</td>
                            <td>
                                <span class="badge badge-danger">
                                    <i class="fas fa-minus"></i> {{ $t->jumlah }}
                                </span>
                            </td>
                            <td>{{ $t->keterangan ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada riwayat transaksi keluar hari ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection