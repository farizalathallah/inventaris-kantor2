@extends('adminlte::page')

@section('title', 'Edit Role User')

@section('content_header')
    <h1>Edit Role: {{ $user->name }}</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label>Nama User</label>
                <input type="text" class="form-control" value="{{ $user->name }}" disabled>
            </div>

            <div class="form-group">
                <label>Pilih Role</label>
                <select name="role" class="form-control">
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User (Staf)</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin (Full Access)</option>
                </select>
            </div>

            <div class="mt-4">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection