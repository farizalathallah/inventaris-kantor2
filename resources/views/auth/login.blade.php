@extends('adminlte::master')

@section('title', 'Login - Sistem Inventaris')

@section('body_class', 'login-page')

@section('body')
<div class="login-box" style="width: 450px;">
    <div class="card shadow-lg border-0 rounded-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
        <div class="card-header text-center" style="background: rgba(255, 255, 255, 0.1); border-bottom: none; padding: 2rem 1rem;">
            <h1 class="h3 mb-0" style="font-weight: 600;">Welcome Back</h1>
            <p class="mb-0 text-white-50">Please sign in to your account</p>
        </div>
        
        <div class="card-body p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first() }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group mb-4">
                    <label for="email" class="mb-2"><i class="fas fa-envelope mr-2"></i>Email Address</label>
                    <input type="email" name="email" id="email" 
                           class="form-control form-control-lg @error('email') is-invalid @enderror" 
                           placeholder="name@example.com" 
                           value="{{ old('email') }}"
                           required 
                           style="border-radius: 10px; background: rgba(255, 255, 255, 0.9); border: none;">
                </div>

                <div class="form-group mb-4">
                    <label for="password" class="mb-2"><i class="fas fa-lock mr-2"></i>Password</label>
                    <input type="password" name="password" id="password" 
                           class="form-control form-control-lg @error('password') is-invalid @enderror" 
                           placeholder="Enter your password" 
                           required 
                           style="border-radius: 10px; background: rgba(255, 255, 255, 0.9); border: none;">
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-light btn-lg btn-block" style="border-radius: 10px; font-weight: 600; color: #764ba2; transition: all 0.3s ease;">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </button>
                </div>
            </form>

            <div class="text-center mt-4">
                <p class="mb-0 text-white-50">Don't have an account? 
                    <a href="{{ route('register') }}" class="text-white fw-bold" style="text-decoration: underline;">Register here</a>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    body.login-page {
        background: #f4f6f9 !important;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    .login-box {
        animation: fadeInUp 0.5s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-control:focus {
        background: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25);
    }

    .btn-light:hover {
        background-color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }
    
    /* Perbaikan untuk alert adminlte */
    .alert .close {
        color: inherit;
    }
</style>
@endsection
