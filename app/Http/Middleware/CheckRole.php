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
        // 1. Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Ambil role user (pastikan tidak null) dan bandingkan
        // strtolower digunakan agar 'Admin' atau 'admin' tetap dianggap sama
        $userRole = strtolower(Auth::user()->role ?? '');
        
        if ($userRole !== strtolower($role)) {
            abort(403, 'Akses Ditolak! Anda bukan ' . $role);
        }

        return $next($request);
    }
}
