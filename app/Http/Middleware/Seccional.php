<?php

namespace SilverDC\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Seccional
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'Seccional') {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role == 'Admin') {
            return redirect('/Admin');
        } elseif (Auth::check() && Auth::user()->role == 'SuperAdmin') {
            return redirect('/Superadmin');
        } elseif (Auth::check() && Auth::user()->role == 'Supervisor') {
            return redirect('/Supervisor');
        } else {
            return redirect('/Polvorinero');
        }
    }
}
