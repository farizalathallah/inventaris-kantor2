@extends('adminlte::page')

@section('content')
<div class="container-fluid">
    <div class="card shadow-none border">
        <div class="card-header bg-primary">
            <h3 class="card-title">Daftar Pengguna Sistem</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px">No</th>
                            <th>Nama</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-center">Role</th>
                            <th class="text-center text-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $u)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-nowrap">{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td class="text-center">
                                <span class="badge {{ $u->role == 'admin' ? 'badge-primary' : 'badge-secondary' }}">
                                    {{ ucfirst($u->role) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('users.edit', $u->id) }}" class="btn btn-xs btn-warning mr-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($u->id !== auth()->id())
                                    <form action="{{ route('users.destroy', $u->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Hapus?')">
                                            <i class="fas fa-trash"></i>
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
    /* Tambahan CSS agar di HP tidak berantakan */
    @media (max-width: 768px) {
        .card-title { font-size: 1rem; }
        .table td, .table th { font-size: 0.85rem; padding: 10px 5px !important; }
        .btn-xs { padding: 2px 5px; font-size: 0.7rem; }
    }
    .text-nowrap { white-space: nowrap !important; }
</style>
@stop
