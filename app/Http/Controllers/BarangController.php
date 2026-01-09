<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori'    => 'required',
            'stok'        => 'required|integer',
            'harga'       => 'required',
            'sumber_dana' => 'required',
        ]);

        // Panggil API Kurs
        $kursDolar = $this->cekHarga($request->nama_barang);
        $hargaInput = (int) str_replace('.', '', $request->harga);

        // Simulasi Harga Pasar (Harga Input + sedikit margin dari kurs)
        $hargaPasar = $hargaInput + ($kursDolar * 0.5); 

        Barang::create([
            'kode_barang'     => $request->kode_barang,
            'nama_barang'     => $request->nama_barang,
            'kategori'        => $request->kategori,
            'stok'            => $request->stok,
            'harga'           => $hargaInput,
            'harga_pasar_api' => $hargaPasar,
            'sumber_dana'     => $request->sumber_dana,
        ]);

        return redirect()->route('barang.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        
        $kursDolar = $this->cekHarga($request->nama_barang);
        $hargaInput = (int) str_replace('.', '', $request->harga);
        $hargaPasar = $hargaInput + ($kursDolar * 0.5);

        $data = $request->all();
        $data['harga'] = $hargaInput;
        $data['harga_pasar_api'] = $hargaPasar;

        $barang->update($data);

        return redirect()->route('barang.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect()->route('barang.index')->with('success', 'Data berhasil dihapus');
    }

    // Fungsi API Harga Pasar (Menggunakan Kurs)
    public function cekHarga($nama)
    {
        $url = "https://api.exchangerate-api.com/v4/latest/USD";

        try {
            $response = Http::timeout(5)->get($url);
            if ($response->successful()) {
                return $response->json()['rates']['IDR'] ?? 15500;
            }
            return 15500;
        } catch (\Exception $e) {
            return 15500;
        }
    }
}