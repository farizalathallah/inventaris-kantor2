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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Dashboard (contoh halaman setelah login)
Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth','role:admin'])->group(function(){
    // route admin nanti di sini
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/barang', [BarangController::class, 'index']);
    Route::get('/barang/create', [BarangController::class, 'create']);
    Route::post('/barang', [BarangController::class, 'store']);
});

Route::resource('barang', BarangController::class);

require __DIR__.'/auth.php';

Route::resource('barang', BarangController::class)->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth');

Route::resource('supplier', SupplierController::class)->middleware('auth');

// Route untuk transaksi
Route::get('/transaksi/masuk', [TransaksiController::class, 'indexMasuk'])->name('transaksi.masuk');
Route::get('/transaksi/keluar', [TransaksiController::class, 'indexKeluar'])->name('transaksi.keluar');
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');

Route::get('/laporan', [TransaksiController::class, 'laporan'])->name('laporan.index');

Route::get('/users', [UserController::class, 'index'])->name('user.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    
    // Route khusus edit role (hanya untuk admin)
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy'); // Tambahkan ini
});

// Route yang BISA diakses oleh Admin & User (Umum)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/keluar', [TransaksiController::class, 'keluar'])->name('transaksi.keluar');
});

// Route yang HANYA BISA diakses oleh Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Master Barang (Create, Edit, Delete)
    Route::resource('barang', BarangController::class)->except(['index', 'show']);
    
    // Manajemen User
    Route::resource('users', UserController::class);

    // ('users.index')
Route::get('/users', [UserController::class, 'index'])->name('users.index');
    
    // Laporan
    Route::get('/laporan', [TransaksiController::class, 'laporan'])->name('laporan.index');
});
// Route yang hanya bisa diakses ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

// Route yang bisa diakses SEMUA (Admin & User)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    // Tambahkan route lain yang bersifat umum di sini
});