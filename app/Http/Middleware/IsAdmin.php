<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role->posisi === 'Admin') {
            return $next($request);
        }

        // Kalau bukan admin, tampilkan error atau redirect
        abort(403, 'Akses ditolak. Halaman ini hanya untuk admin.');
    }
}
