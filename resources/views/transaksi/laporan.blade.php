@extends('adminlte::page')

@section('title', 'Laporan Inventaris')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Laporan Transaksi Barang</h1>
        <button onclick="window.print()" class="btn btn-secondary d-print-none">
            <i class="fas fa-print"></i> Cetak Laporan
        </button>
    </div>
@endsection

@section('content')
<div class="card d-print-none">
    <div class="card-header"><h3 class="card-title">Filter Tanggal</h3></div>
    <div class="card-body">
        <form action="{{ route('laporan.index') }}" method="GET" class="row">
            <div class="col-md-4">
                <input type="date" name="start_date" class="form-control" value="{{ $start_date }}">
            </div>
            <div class="col-md-4">
                <input type="date" name="end_date" class="form-control" value="{{ $end_date }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('laporan.index') }}" class="btn btn-default">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="text-center d-none d-print-block mb-4">
            <h2>Laporan Inventaris Barang</h2>
            <p>Periode: {{ $start_date ?? 'Semua' }} s/d {{ $end_date ?? 'Semua' }}</p>
            <hr>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Barang</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksis as $key => $t)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d/m/Y') }}</td>
                        <td>{{ $t->barang->nama_barang }}</td>
                        <td>
                            <span class="badge badge-{{ $t->jenis == 'masuk' ? 'success' : 'danger' }}">
                                {{ ucfirst($t->jenis) }}
                            </span>
                        </td>
                        <td>{{ $t->jumlah }}</td>
                        <td>{{ $t->keterangan }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
@media print {
    .d-print-none { display: none !important; }
    .d-print-block { display: block !important; }
    .main-footer, .content-header { display: none !important; }
    .content-wrapper { margin-left: 0 !important; }
}
</style>
@endsection
