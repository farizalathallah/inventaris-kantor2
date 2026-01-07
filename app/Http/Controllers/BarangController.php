<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

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
            'kategori' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required',
            'sumber_dana' => 'required',
        ]);

        Barang::create([
        'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang,
        'kategori'    => $request->kategori,
        'stok'        => $request->stok,
        'harga'       => str_replace('.', '', $request->harga),
        'sumber_dana' => $request->sumber_dana,
    ]);

        return redirect('/barang');
    }

    public function edit($id)
{
    $barang = Barang::findOrFail($id);
    return view('barang.edit', compact('barang'));
}

public function update(Request $request, $id)
{
    $barang = Barang::findOrFail($id);
    $barang->update($request->except('_token','_method'));

    return redirect()->route('barang.index')
                     ->with('success', 'Data berhasil diupdate');
}

public function destroy($id)
{
    Barang::destroy($id);

    return redirect()->route('barang.index')
                     ->with('success', 'Data berhasil dihapus');
}

}
