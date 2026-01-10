<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function store(Request $request) 
    {
        // 1. Validasi Input yang lebih ketat
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jenis'     => 'required|in:masuk,keluar',
            'jumlah'    => 'required|integer|min:1',
            'tanggal'   => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        // 2. Cari barang
        $barang = Barang::findOrFail($request->barang_id);

        // 3. Logika Update Stok
        if ($request->jenis == 'masuk') {
            $barang->stok += $request->jumlah;
        } else {
            // Cek stok sebelum dikurangi
            if ($barang->stok < $request->jumlah) {
                return back()->with('error', 'Gagal! Stok ' . $barang->nama . ' tidak mencukupi.');
            }
            $barang->stok -= $request->jumlah;
        }

        // 4. SIMPAN PERUBAHAN STOK KE DATABASE
        $barang->save();

        // 5. SIMPAN RIWAYAT TRANSAKSI (Gunakan data spesifik agar aman)
        Transaksi::create([
            'barang_id'  => $request->barang_id,
            'jenis'      => $request->jenis,
            'jumlah'     => $request->jumlah,
            'tanggal'    => $request->tanggal,
            'keterangan' => $request->keterangan, // Pastikan input 'keterangan' ada di form
        ]);

        return redirect()->back()->with('success', 'Transaksi ' . $request->jenis . ' berhasil dicatat dan stok diperbarui!');
    }

    public function indexMasuk()
    {
        $barangs = Barang::all();
        $transaksis = Transaksi::with('barang')->where('jenis', 'masuk')->latest()->get();
        return view('transaksi.masuk', compact('barangs', 'transaksis'));
    }

    public function indexKeluar()
    {
        $barangs = Barang::all();
        $transaksis = Transaksi::with('barang')->where('jenis', 'keluar')->latest()->get();
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
        
        return view('transaksi.laporan', compact('transaksis', 'start_date', 'end_date'));
    }
}
