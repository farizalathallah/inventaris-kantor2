<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Wajib import ini

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Baris ini akan memaksa semua link asset menggunakan https://
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
