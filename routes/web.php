<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController; 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Guest Routes (Belum Login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/', function () { 
        return redirect()->route('login'); 
    });
    
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

/*
|--------------------------------------------------------------------------
| Auth Routes (Sudah Login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    
    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Akses Umum: Barang & Supplier (Lihat Saja)
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    
    // Transaksi (User & Admin bisa input)
    Route::get('/transaksi/masuk', [TransaksiController::class, 'indexMasuk'])->name('transaksi.masuk');
    Route::get('/transaksi/keluar', [TransaksiController::class, 'indexKeluar'])->name('transaksi.keluar');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');

    /*
    |--------------------------------------------------------------------------
    | Admin Only Routes (Hanya Role: admin)
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {
        
        // Master Barang (Create, Edit, Delete)
        Route::resource('barang', BarangController::class)->except(['index']);
        
        // Master Supplier (Full CRUD)
        Route::resource('supplier', SupplierController::class)->except(['index']);
        
        // Manajemen User
        Route::resource('users', UserController::class);
        
        // Laporan (DISINKRONKAN: Menggunakan nama 'laporan.index')
        Route::get('/laporan', [TransaksiController::class, 'laporan'])->name('laporan.index');
    });
});
