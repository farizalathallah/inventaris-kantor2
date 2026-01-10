<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void { }

    public function boot(): void
    {
        // Memaksa HTTPS jika tidak di komputer lokal (solusi tampilan polos)
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
