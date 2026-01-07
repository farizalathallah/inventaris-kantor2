<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model ini.
     * (Opsional, Laravel otomatis mendeteksi jamak dari 'Supplier' menjadi 'suppliers')
     */
    protected $table = 'suppliers';

    /**
     * Kolom yang boleh diisi secara massal (Mass Assignment).
     * Pastikan kolom ini sesuai dengan file migration kamu.
     */
    protected $fillable = [
        'nama_supplier',
        'kontak',
        'alamat',
        'perusahaan',
    ];
}