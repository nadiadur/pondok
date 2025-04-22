<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Mengecek apakah user yang login memiliki role 'admin'
        if ($request->user() && $request->user()->role == 'admin') {
            return $next($request); // Lanjutkan ke route selanjutnya
        }

        return redirect('/'); // Redirect ke halaman depan jika bukan admin
    }
}
