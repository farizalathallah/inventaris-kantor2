@extends('adminlte::page')

@section('title', 'Data Barang')

@section('content_header')
    <h1>Data Barang & Perbandingan Harga Pasar</h1>
@endsection

@section('content')

{{-- 1. BAGIAN ALERT STOK TIPIS --}}
@php
    $stokTerbatas = $barangs->where('stok', '<=', 5);
@endphp

@if($stokTerbatas->count() > 0)
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan Stok Tipis!</h5>
        <ul class="mb-0">
            @foreach($stokTerbatas as $item)
                <li>Barang <strong>{{ $item->nama_barang }}</strong> tersisa {{ $item->stok }} unit.</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-chart-line mr-1"></i> Monitor Inventaris & Real-time API</h3>
        <div class="card-tools">
            <a href="/barang/create" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Barang
            </a>
        </div>
    </div>
    
    <div class="card-body">
        {{-- 2. PESAN SUKSES --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped mt-3">
                <thead class="bg-dark text-white">
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Harga Kantor</th>
                        <th class="bg-primary">Harga Pasar (API)</th>
                        <th>Status Harga</th>
                        <th style="width: 100px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $key => $b)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><span class="badge badge-info">{{ $b->kode_barang }}</span></td>
                        <td><strong>{{ $b->nama_barang }}</strong><br><small class="text-muted">{{ $b->kategori }}</small></td>
                        
                        <td>
                            @if($b->stok <= 5)
                                <span class="badge badge-danger">{{ $b->stok }}</span>
                                <small class="text-danger d-block">Restock!</small>
                            @else
                                <span class="badge badge-success">{{ $b->stok }}</span>
                            @endif
                        </td>

                        <td>Rp {{ number_format($b->harga, 0, ',', '.') }}</td>

                        {{-- KOLOM API HARGA PASAR --}}
                        <td class="text-primary font-weight-bold">
                            Rp {{ number_format($b->harga_pasar_api ?? 0, 0, ',', '.') }}
                        </td>

                        {{-- LOGIKA PERBANDINGAN HARGA --}}
                        <td>
                            @if($b->harga > ($b->harga_pasar_api ?? 0))
                                <span class="badge badge-warning text-dark">
                                    <i class="fas fa-arrow-up"></i> Overprice
                                </span>
                            @else
                                <span class="badge badge-success">
                                    <i class="fas fa-check-circle"></i> Normal
                                </span>
                            @endif
                        </td>

                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-sm btn-warning mr-2 d-inline-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('barang.destroy', $b->id) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger d-inline-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" onclick="return confirm('Hapus data ini?')" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection