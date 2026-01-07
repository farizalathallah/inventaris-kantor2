<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class KursService
{
    public static function getDollarRate()
    {
        $response = Http::get('https://api.exchangerate.host/latest?base=USD&symbols=IDR');

        return $response['rates']['IDR'] ?? 0;
    }
}
