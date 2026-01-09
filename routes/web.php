<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController; 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/', function () { return redirect()->route('login'); });
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Auth Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Akses Umum (User & Admin)
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::resource('supplier', SupplierController::class);

    // Route Khusus Admin
    Route::middleware('role:admin')->group(function () {
        // Master Barang (Hanya admin yang bisa Create, Edit, Delete)
        Route::resource('barang', BarangController::class)->except(['index']);
        
        // Manajemen User
        Route::resource('users', UserController::class);
    });
});
