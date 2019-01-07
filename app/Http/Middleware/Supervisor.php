<?php

namespace SilverDC\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Supervisor
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
        if (Auth::check() && Auth::user()->role == 'Supervisor') {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role == 'Admin') {
            return redirect('/Admin');
        } elseif (Auth::check() && Auth::user()->role == 'Seccional') {
            return redirect('/Seccional');
        } elseif (Auth::check() && Auth::user()->role == 'SuperAdmin') {
            return redirect('/SuperAdmin');
        } else {
            return redirect('/Polvorinero');
        }
    }
}
