@extends('adminlte::page')

@section('title', 'Edit Role User')

@section('content_header')
    <h1>Edit Akses Pengguna</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-warning card-outline">
            <div class="card-header">
                <h3 class="card-title">Form Perubahan Role: <b>{{ $user->name }}</b></h3>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="role">Pilih Role Baru</label>
                        <select name="role" id="role" class="form-control">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User (Staf Biasa)</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin (Akses Penuh)</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Perbarui Role
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
