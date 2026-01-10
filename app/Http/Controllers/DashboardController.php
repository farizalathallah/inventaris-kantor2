<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Menghitung total stok seluruh barang
        $totalBarang = Barang::sum('stok');

        // 2. Menghitung total nilai aset (stok * harga)
        // Menangani null dengan ?? 0 agar tidak error jika database kosong
        $totalAset = Barang::selectRaw('SUM(stok * harga) as total')->value('total') ?? 0;

        // 3. Menghitung jumlah user terdaftar
        $totalUser = User::count();

        // 4. Kirim data ke view dashboard
        return view('dashboard', compact('totalBarang', 'totalAset', 'totalUser'));
    }
}
