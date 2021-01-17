<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Masyarakat
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'masyarakat') {
            return $next($request);
        }
        else {
            return redirect('/');
        }
    }
}
