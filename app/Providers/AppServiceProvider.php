<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Wajib ditambahkan

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Memaksa Laravel menggunakan protokol HTTPS pada semua aset (CSS/JS) 
         * jika aplikasi berjalan di lingkungan 'production' (Railway).
         * Ini akan memperbaiki error "Mixed Content" di console browser kamu.
         */
        if (config('app.env') !== 'local') {
        \Illuminate\Support\Facades\URL::forceScheme('https');
    }
}
}
