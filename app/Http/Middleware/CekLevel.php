<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekLevel
{
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        // Cek apakah user sudah login & levelnya sesuai dengan yang diizinkan
        if (in_array($request->user()->level, $levels)) {
            return $next($request);
        }

        // Jika tidak punya akses, kembalikan ke dashboard atau halaman error
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
    }
}
