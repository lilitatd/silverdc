<?php

namespace SilverDC\Http\Middleware;

use Closure;

class Polvorinero
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
        if (Auth::check() && Auth::user()->role == 'Polvorinero') {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role == 'Admin') {
            return redirect('/admin');
        } elseif (Auth::check() && Auth::user()->role == 'Seccional') {
            return redirect('/seccional');
        } elseif (Auth::check() && Auth::user()->role == 'Supervisor') {
            return redirect('/supervisor');
        } else {
            return redirect('/superadmin');
        }
    }
}
