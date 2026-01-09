<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Cek apakah role di database sesuai dengan route (admin)
        if (Auth::user()->role !== $role) {
            abort(403, 'Akses Ditolak! Anda bukan ' . $role);
        }

        return $next($request);
    }
}
