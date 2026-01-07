<?php

namespace App\Http\Controllers;

use App\Models\Supplier; // 1. INI WAJIB ADA (Tadi di kode kamu belum ada)
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() 
    {
        // 2. PERBAIKAN: Panggil Model Supplier, bukan SupplierController
        $suppliers = Supplier::all(); 
        return view('supplier.index', compact('suppliers'));
    }

    public function create() 
    {
        return view('supplier.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'nama_supplier' => 'required',
            'kontak'        => 'required',
            'perusahaan'    => 'required',
            'alamat'        => 'required', // Tambahkan alamat jika di database "required"
        ]);

        Supplier::create($request->all());

        return redirect('/supplier')->with('success', 'Supplier berhasil ditambah');
    }
    // Tambahkan di dalam class SupplierController

public function edit($id)
{
    $supplier = Supplier::findOrFail($id);
    return view('supplier.edit', compact('supplier'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_supplier' => 'required',
        'kontak' => 'required',
        'perusahaan' => 'required',
        'alamat' => 'required',
    ]);

    $supplier = Supplier::findOrFail($id);
    $supplier->update($request->all());

    return redirect('/supplier')->with('success', 'Data supplier berhasil diperbarui');
}

public function destroy($id)
{
    $supplier = Supplier::findOrFail($id);
    $supplier->delete();

    return redirect('/supplier')->with('success', 'Supplier berhasil dihapus');
}
}