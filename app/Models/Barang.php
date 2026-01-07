<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
    'kode_barang',
    'nama_barang',
    'kategori',
    'stok',
    'jumlah',
    'harga',
    'sumber_dana',
];

public function transaksis() {
    return $this->hasMany(Transaksi::class);
}

}
