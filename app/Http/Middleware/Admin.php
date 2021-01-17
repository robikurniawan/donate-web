<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Admin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'superadmin'  || Auth::user()->role == 'admin' ) {
            return $next($request);
        }
        else {
            return redirect('/dashboard');
        }
    }
}
