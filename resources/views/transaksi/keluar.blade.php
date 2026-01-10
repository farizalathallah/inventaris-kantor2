@extends('adminlte::page')

@section('title', 'Transaksi Barang Keluar')

@section('content_header')
    <h1>Input Barang Keluar</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card card-outline card-danger shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Form Input Keluar</h3>
                </div>
                
                {{-- Form Start --}}
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    {{-- Hidden input untuk membedakan tipe transaksi di controller --}}
                    <input type="hidden" name="jenis" value="keluar">

                    <div class="card-body">
                        {{-- Pilih Barang --}}
                        <div class="form-group">
                            <label for="barang_id">Pilih Barang</label>
                            <select name="barang_id" id="barang_id" class="form-control select2 @error('barang_id') is-invalid @enderror" style="width: 100%;">
                                <option value="" selected disabled>-- Pilih Barang (Tersedia) --</option>
                                @foreach($barangs as $b)
                                    <option value="{{ $b->id }}" {{ old('barang_id') == $b->id ? 'selected' : '' }}>
                                        {{ $b->nama }} (Sisa: {{ $b->stok }})
                                    </option>
                                @endforeach
                            </select>
                            @error('barang_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Jumlah Keluar --}}
                        <div class="form-group">
                            <label for="jumlah">Jumlah Keluar</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" 
                                   placeholder="0" value="{{ old('jumlah') }}" min="1">
                            @error('jumlah')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Tanggal --}}
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>

                        {{-- Keterangan / Tujuan --}}
                        <div class="form-group">
                            <label for="keterangan">Tujuan / Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Contoh: Divisi HRD / Ruang Rapat">{{ old('keterangan') }}</textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        {{-- Button block agar mudah ditekan di HP --}}
                        <button type="submit" class="btn btn-danger btn-block shadow">
                            <i class="fas fa-sign-out-alt mr-1"></i> Simpan Barang Keluar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Riwayat Keluar (Opsional - Tabel Responsif di bawahnya) --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Riwayat Barang Keluar Hari Ini</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-valign-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Waktu</th>
                                    <th>Nama Barang</th>
                                    <th class="text-center">Jumlah</th>
                                    <th>Tujuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Loop riwayat transaksi keluar di sini --}}
                                @forelse($riwayat_keluar ?? [] as $rk)
                                <tr>
                                    <td>{{ $rk->created_at->format('H:i') }}</td>
                                    <td class="text-nowrap">{{ $rk->barang->nama }}</td>
                                    <td class="text-center"><span class="badge badge-danger">-{{ $rk->jumlah }}</span></td>
                                    <td>{{ $rk->keterangan }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">Belum ada transaksi keluar hari ini.</td>
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
<style>
    /* Mengoptimalkan tampilan Select2 agar responsif */
    .select2-container .select2-selection--single {
        height: 38px !important;
        border: 1px solid #ced4da !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px !important;
    }
    /* Memastikan dropdown tidak terpotong di layar kecil */
    @media (max-width: 576px) {
        .card-title { font-size: 1.1rem; }
        .btn-block { font-size: 1rem; padding: 10px; }
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        // Inisialisasi Select2 untuk dropdown barang
        $('.select2').select2({
            theme: 'bootstrap4',
            placeholder: "Cari Barang..."
        });
    });
</script>
@stop
