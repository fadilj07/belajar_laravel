<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserModels;

use Illuminate\Support\Facades\Session;

class loggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $loginStatus = Session::get('loginStatus');

        // Jika pengguna belum login, arahkan ke halaman login
        if (!$loginStatus) {
            return redirect()->route('login');
        }

        // Jika pengguna sudah login, lanjutkan ke request berikutnya
        return $next($request);
    }
}