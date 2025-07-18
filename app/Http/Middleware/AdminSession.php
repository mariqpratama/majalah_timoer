<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminSession
{
    public function handle($request, Closure $next)
    {
        if (!Session::get('is_admin')) {
            return redirect('/login');
        }
        return $next($request);
    }
}