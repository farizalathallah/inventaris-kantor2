<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Paksa HTTPS di environment Railway agar CSS/JS tidak terblokir
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
