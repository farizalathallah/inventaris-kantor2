<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Wajib ditambahkan
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel 10 otomatis handle hash
    ];

    public function adminlte_image()
    {
        return asset('vendor/adminlte/dist/img/user2-160x160.jpg');
    }

    public function adminlte_desc()
    {
        return 'Status: ' . ucfirst($this->role);
    }
}
