@extends('adminlte::page')

@section('title', 'Manajemen User')

@section('content_header')
    <h1>Daftar Pengguna Sistem</h1>
@stop

@section('content')
<div class="container-fluid">
    {{-- Alert Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Sukses!</h5>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Error!</h5>
            {{ session('error') }}
        </div>
    @endif

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data User Terdaftar</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th style="width: 50px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Tanggal Join</th>
                            <th style="width: 180px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $u)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                @if($u->role == 'admin')
                                    <span class="badge badge-primary">Admin</span>
                                @else
                                    <span class="badge badge-secondary">User/Staff</span>
                                @endif
                            </td>
                            <td>{{ $u->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit Role
                                    </a>

                                    {{-- Tombol Hapus (Hanya jika bukan diri sendiri) --}}
                                    @if($u->id !== auth()->id())
                                    <form action="{{ route('users.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ml-1">
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
</div>
@stop
