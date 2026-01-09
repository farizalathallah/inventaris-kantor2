<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController; 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

// Guest Routes (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/', function () { return redirect()->route('login'); });
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Auth Routes (Sudah Login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Barang & Supplier (Akses Umum)
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::resource('supplier', SupplierController::class);

    // Transaksi
    Route::get('/transaksi/masuk', [TransaksiController::class, 'indexMasuk'])->name('transaksi.masuk');
    Route::get('/transaksi/keluar', [TransaksiController::class, 'indexKeluar'])->name('transaksi.keluar');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/laporan', [TransaksiController::class, 'laporan'])->name('laporan.index');

    // Route Khusus Admin
    Route::middleware('role:admin')->group(function () {
        // Master Barang (Create, Edit, Delete)
        Route::resource('barang', BarangController::class)->except(['index']);
        
        // Manajemen User
        Route::resource('users', UserController::class);
    });
});

require __DIR__.'/auth.php';
