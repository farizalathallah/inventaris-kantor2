<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total stok dari semua barang
        $totalBarang = Barang::sum('stok');

        // Menghitung total nilai aset (stok dikali harga)
        $totalAset = Barang::selectRaw('SUM(stok * harga) as total')->value('total') ?? 0;

        // Menghitung total user terdaftar
        $totalUser = User::count();

        return view('dashboard', compact('totalBarang', 'totalAset', 'totalUser'));
    }
}
