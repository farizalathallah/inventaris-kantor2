<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void { }

    public function boot(): void
    {
        // Memaksa Laravel menggunakan HTTPS agar CSS/JS terbaca di Railway
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
