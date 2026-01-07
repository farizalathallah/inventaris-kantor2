<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Untuk menangani query DB::raw

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Menghitung total stok seluruh barang
        $totalBarang = Barang::sum('stok');

        // 2. Menghitung total nilai aset (stok * harga)
        // Kita gunakan selectRaw atau DB::raw agar kalkulasi dilakukan langsung oleh database
        $totalAset = Barang::selectRaw('SUM(stok * harga) as total')->value('total') ?? 0;

        // 3. Menghitung jumlah user terdaftar
        $totalUser = User::count();

        // 4. Kirim semua data ke view 'dashboard'
        // Pastikan nama view sesuai (dashboard.blade.php)
        return view('dashboard', compact('totalBarang', 'totalAset', 'totalUser'));
    }
}