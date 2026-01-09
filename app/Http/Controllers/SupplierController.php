<?php

namespace App\Http\Controllers;

use App\Models\Supplier; 
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() 
    {
        $suppliers = Supplier::all(); 
        // Gunakan huruf kecil 'supplier.index'
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
            'alamat'        => 'required',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambah');
    }

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

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil diperbarui');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil dihapus');
    }
}
