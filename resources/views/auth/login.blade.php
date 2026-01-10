@extends('adminlte::master')

@section('body')
<div style="height: 100vh; display: flex; align-items: center; justify-content: center; background: #f4f6f9;">
    <div style="width: 100%; max-width: 400px; padding: 15px;">
        <div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
            <div class="text-center p-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <h2 class="font-weight-bold">Welcome Back</h2>
                <p class="mb-0 opacity-75">Sistem Inventaris Kantor</p>
            </div>
            <div class="card-body p-4 bg-white">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label><i class="fas fa-envelope mr-2 text-primary"></i>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="admin@example.com" required style="border-radius: 8px;">
                    </div>
                    <div class="form-group mb-4">
                        <label><i class="fas fa-lock mr-2 text-primary"></i>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required style="border-radius: 8px;">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block p-2" style="border-radius: 8px; background: #764ba2; border: none; font-weight: 600;">
                        LOGIN
                    </button>
                </form>
                <div class="text-center mt-3">
                    <small>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
