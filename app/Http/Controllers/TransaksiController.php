<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function store(Request $request) 
    {
        $request->validate([
            'barang_id' => 'required',
            'jenis'     => 'required',
            'jumlah'    => 'required|integer|min:1',
            'tanggal'   => 'required|date',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($request->jenis == 'masuk') {
            $barang->stok += $request->jumlah;
        } else {
            if ($barang->stok < $request->jumlah) {
                return back()->with('error', 'Stok tidak mencukupi! Sisa stok: ' . $barang->stok);
            }
            $barang->stok -= $request->jumlah;
        }

        $barang->save();
        Transaksi::create($request->all());

        return redirect()->back()->with('success', 'Transaksi berhasil dicatat');
    }

    public function indexMasuk()
    {
        $barangs = Barang::all();
        $transaksis = Transaksi::with('barang')->where('jenis', 'masuk')->latest()->get();
        // PERBAIKAN: Folder 'transaksi' huruf kecil
        return view('transaksi.masuk', compact('barangs', 'transaksis'));
    }

    public function indexKeluar()
    {
        $barangs = Barang::all();
        $transaksis = Transaksi::with('barang')->where('jenis', 'keluar')->latest()->get();
        // PERBAIKAN: Folder 'transaksi' huruf kecil
        return view('transaksi.keluar', compact('barangs', 'transaksis'));
    }

    public function laporan(Request $request)
    {
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        $query = Transaksi::with('barang');

        if ($start_date && $end_date) {
            $query->whereBetween('tanggal', [$start_date, $end_date]);
        }

        $transaksis = $query->latest()->get();
        
        // PERBAIKAN: Folder 'transaksi' huruf kecil
        return view('transaksi.laporan', compact('transaksis', 'start_date', 'end_date'));
    }
}
