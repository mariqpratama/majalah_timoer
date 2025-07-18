<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminSession
{
    public function handle($request, Closure $next)
    {
        if (!Session::get('is_admin')) {
            // Jika request mengharapkan JSON (misalnya dari fetch atau axios)
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            // Jika bukan JSON (misalnya akses biasa dari browser), redirect ke login
            return redirect('/login');
        }

        return $next($request);
    }
}