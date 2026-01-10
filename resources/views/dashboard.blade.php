@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Inventaris Kantor</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info shadow">
                <div class="inner">
                    <h3>{{ number_format($totalBarang ?? 0) }}</h3>
                    <p>Total Unit Barang</p>
                </div>
                <div class="icon"><i class="fas fa-box"></i></div>
                <a href="{{ route('barang.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-success shadow">
                <div class="inner">
                    <h3 style="white-space: nowrap;">Rp {{ number_format($totalAset ?? 0, 0, ',', '.') }}</h3>
                    <p>Total Nilai Aset</p>
                </div>
                <div class="icon"><i class="fas fa-money-bill-wave"></i></div>
                <a href="{{ route('laporan.index') }}" class="small-box-footer">
                    Lihat Laporan <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="small-box bg-warning shadow">
                <div class="inner">
                    <h3>{{ $totalUser ?? 0 }}</h3>
                    <p>User Terdaftar</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
                <a href="{{ route('users.index') }}" class="small-box-footer">
                    Info User <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    /* Mencegah teks angka meluber pada layar kecil */
    @media (max-width: 576px) {
        .small-box h3 { font-size: 1.3rem !important; }
    }
</style>
@stop
