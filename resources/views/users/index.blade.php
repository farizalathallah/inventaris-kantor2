@extends('adminlte::page')

@section('title', 'Data User')

@section('content_header')
    <h1>Data User Terdaftar</h1>
@endsection

@section('content')

{{-- Menampilkan Pesan Sukses --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Sukses!</h5>
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Pengguna Sistem</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Bergabung</th>
                        {{-- Kolom Aksi Hanya Muncul di layar Admin --}}
                        @if(auth()->user()->role == 'admin')
                            <th style="width: 150px">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $u)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            <span class="badge {{ $u->role == 'admin' ? 'badge-primary' : 'badge-secondary' }}">
                                {{ ucfirst($u->role ?? 'User') }}
                            </span>
                        </td>
                        <td>{{ $u->created_at->format('d M Y') }}</td>
                        
                        {{-- Logika Tombol Aksi --}}
                        @if(auth()->user()->role == 'admin')
                        <td>
                            <div class="d-flex">
                                {{-- 1. Tombol Edit Role --}}
                                <a href="{{ route('user.edit', $u->id) }}" class="btn btn-sm btn-warning mr-2" title="Ubah Role">
                                    <i class="fas fa-user-shield"></i> Edit
                                </a>

                                {{-- 2. Tombol Hapus (Admin tidak bisa hapus diri sendiri) --}}
                                @if($u->id !== auth()->id())
                                <form action="{{ route('user.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection