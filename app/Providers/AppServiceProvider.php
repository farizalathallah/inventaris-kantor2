<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
         * Memaksa Laravel menggunakan skema HTTPS saat di Railway (production).
         * Ini akan memperbaiki error "Mixed Content" dan memunculkan kembali CSS/JS AdminLTE.
         */
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
