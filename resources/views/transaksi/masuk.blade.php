@extends('adminlte::page')

@section('title', 'Barang Masuk')

@section('content_header')
    <h1>Input Barang Masuk</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card card-outline card-success shadow-sm">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-plus-square mr-2"></i>Form Stok Masuk</h3>
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
                                    {{-- PERBAIKAN: Menggunakan nama_barang sesuai Model --}}
                                    <option value="{{ $b->id }}">{{ $b->nama_barang }} (Stok: {{ $b->stok }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Masuk</label>
                            <input type="number" name="jumlah" class="form-control" placeholder="0" min="1" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        {{-- PERBAIKAN: Menambahkan kolom keterangan yang sebelumnya hilang --}}
                        <div class="form-group">
                            <label>Keterangan / Sumber</label>
                            <textarea name="keterangan" class="form-control" rows="2" placeholder="Contoh: Dari Supplier A / Pembelian Baru"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block">
                            <i class="fas fa-save mr-1"></i> Simpan Barang Masuk
                        </button>
                    </div>
                </form>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-header bg-light">
                    <h3 class="card-title"><i class="fas fa-history mr-2"></i>Riwayat Masuk Terakhir</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Barang</th>
                                    <th class="text-center">Jumlah</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transaksis as $t)
                                <tr>
                                    <td>{{ date('d/m/Y', strtotime($t->tanggal)) }}</td>
                                    {{-- PERBAIKAN: Menggunakan nama_barang --}}
                                    <td>{{ $t->barang->nama_barang ?? 'N/A' }}</td>
                                    <td class="text-center"><span class="badge badge-success">+{{ $t->jumlah }}</span></td>
                                    <td>{{ $t->keterangan ?? '-' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-3">Belum ada riwayat masuk hari ini.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.0.0/dist/select2-bootstrap4.min.css">
    <style>
        .select2-container .select2-selection--single { height: 38px !important; border: 1px solid #ced4da !important; }
        .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered { line-height: 38px !important; }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({ theme: 'bootstrap4', placeholder: "-- Pilih Barang --" });
        });
    </script>
@stop
