<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class loginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $loginStatus = Session::get('loginStatus');

        // Jika pengguna sudah login, arahkan ke dashboard
        if ($loginStatus) {
            return redirect()->route('dashboard');
        }

        // Jika pengguna belum login, lanjutkan ke request berikutnya
        return $next($request);
    }
}