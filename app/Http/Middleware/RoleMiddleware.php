<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect('/login'); // Redirect ke login jika belum login
        }

        // Cek apakah role user sesuai dengan yang diizinkan
        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized action.'); // Tampilkan error 403 jika tidak sesuai
        }

        return $next($request);
    }
}
