@extends('adminlte::page')

@section('title', 'Manajemen User')

@section('content_header')
    <h1>Daftar Pengguna Sistem</h1>
@stop

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Sukses!</h5>
            {{ session('success') }}
        </div>
    @endif

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data User Terdaftar</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th style="width: 50px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Tanggal Join</th>
                            <th style="width: 150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $u)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td class="text-center">
                                @if($u->role == 'admin')
                                    <span class="badge badge-primary px-2">Admin</span>
                                @else
                                    <span class="badge badge-secondary px-2">User/Staff</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $u->created_at->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    {{-- Tombol Edit dengan btn-sm dan padding kecil --}}
                                    <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning btn-sm py-0 px-2 mr-1" title="Edit Role">
                                        <i class="fas fa-edit fa-sm"></i> <small>Edit Role</small>
                                    </a>

                                    @if($u->id !== auth()->id())
                                    <form action="{{ route('users.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Hapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm py-0 px-2">
                                            <i class="fas fa-trash fa-sm"></i> <small>Hapus</small>
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
</div>
@stop

@section('css')
<style>
    /* Mengatur agar teks di dalam tabel berada di tengah secara vertikal */
    .table td, .table th {
        vertical-align: middle !important;
        padding: 0.5rem !important;
    }
    /* Memastikan tombol tidak terlalu tinggi */
    .btn-sm {
        height: 25px;
        line-height: 25px;
        display: inline-flex;
        align-items: center;
    }
</style>
@stop
