<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Baris ini wajib ada untuk mengatur URL

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
         * Memaksa Laravel menggunakan skema HTTPS jika berjalan di environment production (Railway).
         * Ini akan memperbaiki error "Mixed Content" yang membuat CSS/JS tidak terbaca.
         */
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
