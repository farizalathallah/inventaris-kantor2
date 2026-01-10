<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data real-time dari database
        $totalBarang = Barang::sum('stok');
        $totalAset = Barang::selectRaw('SUM(stok * harga) as total')->value('total') ?? 0;
        $totalUser = User::count();

        return view('dashboard', compact('totalBarang', 'totalAset', 'totalUser'));
    }
}
