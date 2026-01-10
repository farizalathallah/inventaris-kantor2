@extends('adminlte::page')

@section('title', 'Manajemen User')

@section('content_header')
    <h1>Daftar Pengguna Sistem</h1>
@stop

@section('content')
<div class="container-fluid">
    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body p-0"> {{-- p-0 agar tabel penuh ke pinggir card --}}
            <table class="table table-sm table-hover table-valign-middle mb-0">
                <thead class="bg-primary">
                    <tr>
                        <th style="width: 50px" class="text-center">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Tanggal Join</th>
                        <th style="width: 180px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $u)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-bold">{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td class="text-center">
                            <span class="badge {{ $u->role == 'admin' ? 'badge-primary' : 'badge-secondary' }} px-2">
                                {{ ucfirst($u->role) }}
                            </span>
                        </td>
                        <td class="text-center text-muted small">{{ $u->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center">
                                {{-- Tombol Edit Sempit --}}
                                <a href="{{ route('users.edit', $u->id) }}" class="btn btn-xs btn-warning mr-1 shadow-sm text-nowrap">
                                    <i class="fas fa-edit"></i> Edit Role
                                </a>

                                @if($u->id !== auth()->id())
                                <form action="{{ route('users.destroy', $u->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger shadow-sm text-nowrap">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    /* Menghilangkan padding berlebih agar baris tabel ramping */
    .table-sm td, .table-sm th {
        padding: 0.4rem !important;
        vertical-align: middle !important;
    }
    /* Memaksa teks tombol tidak turun ke bawah */
    .text-nowrap {
        white-space: nowrap !important;
    }
    /* Ukuran font tombol xs */
    .btn-xs {
        padding: 1px 5px !important;
        font-size: 0.75rem !important;
        line-height: 1.5 !important;
        border-radius: 3px !important;
    }
</style>
@stop
