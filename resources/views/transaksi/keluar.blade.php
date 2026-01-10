@extends('adminlte::page')

@section('title', 'Barang Keluar')

@section('content_header')
    <h1>Input Barang Keluar</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card card-outline card-danger shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Form Pengeluaran Barang</h3>
                </div>
                
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="jenis" value="keluar">

                    <div class="card-body">
                        {{-- Pilih Barang --}}
                        <div class="form-group">
                            <label>Pilih Barang</label>
                            <select name="barang_id" class="form-control select2 @error('barang_id') is-invalid @enderror" style="width: 100%;">
                                <option value="" selected disabled>-- Pilih Barang --</option>
                                @foreach($barangs as $b)
                                    {{-- Perbaikan: Menampilkan Nama Barang --}}
                                    <option value="{{ $b->id }}">
                                        {{ $b->nama }} (Sisa: {{ $b->stok }})
                                    </option>
                                @endforeach
                            </select>
                            @error('barang_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        {{-- Jumlah --}}
                        <div class="form-group">
                            <label>Jumlah Keluar</label>
                            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" placeholder="0" min="1">
                            @error('jumlah') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        {{-- Keterangan --}}
                        <div class="form-group">
                            <label>Tujuan / Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="2" placeholder="Contoh: Untuk Divisi IT"></textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fas fa-minus-circle mr-1"></i> Simpan Barang Keluar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('.select2').select2({ theme: 'bootstrap4' });
    });
</script>
@stop
