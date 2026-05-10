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
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login DAN role-nya adalah ADMIN
        if (Auth::check() && Auth::user()->role === 'ADMIN') {
            // Jika ya, persilakan masuk
            return $next($request);
        }

        // Jika bukan ADMIN (misal: Siswa nakal), tendang kembali ke dashboard utama
        return redirect()->route('dashboard.index')->with('error', 'Akses Ditolak! Halaman tersebut hanya untuk Administrator.');
    }
}