<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CheckCompanyStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'PERUSAHAAN' && auth()->user()->status === 'PENDING') {
            auth()->logout();
            return redirect()->route('login')->with('error', 'Akun perusahaan Anda sedang menunggu verifikasi admin (1-2 hari kerja).');
        }
        return $next($next);
    }
}
