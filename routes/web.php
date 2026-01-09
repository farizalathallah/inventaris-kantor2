<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController; 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
// Import Controller bawaan Breeze
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Guest Routes (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/', function () { return redirect()->route('login'); });
    
    // Login menggunakan AuthenticatedSessionController
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    
    // Register menggunakan RegisteredUserController
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Auth Routes (Sudah Login)
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Akses Umum (User & Admin bisa melihat daftar barang & supplier)
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::resource('supplier', SupplierController::class);
    
    // Transaksi
    Route::get('/transaksi/masuk', [TransaksiController::class, 'indexMasuk'])->name('transaksi.masuk');
    Route::get('/transaksi/keluar', [TransaksiController::class, 'indexKeluar'])->name('transaksi.keluar');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');

    // Route Khusus Admin (Hanya Role: admin)
    Route::middleware('role:admin')->group(function () {
        // Master Barang (Hanya admin yang bisa Create, Edit, Delete)
        Route::resource('barang', BarangController::class)->except(['index']);
        
        // Manajemen User
        Route::resource('users', UserController::class);
        
        // Laporan (Biasanya admin saja)
        Route::get('/laporan', [TransaksiController::class, 'laporan'])->name('laporan.index');
    });
});

// Hapus atau beri komentar jika file ini bentrok dengan route di atas
// require __DIR__.'/auth.php';
