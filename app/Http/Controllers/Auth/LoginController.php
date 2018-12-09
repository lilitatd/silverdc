<?php

namespace SilverDC\Http\Controllers\Auth;

use SilverDC\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/planeacions';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Sobrescribiendo funcion
     *
     * @return void
     */
    public function redirectTo()
    {
        if (Auth::check() && Auth::user()->role == 'SuperAdmin') {
            return '/SuperAdmin';
        } elseif (Auth::check() && Auth::user()->role == 'Admin') {
            return '/Admin';        
        } elseif (Auth::check() && Auth::user()->role == 'Seccional') {
            return '/Seccional';        
        } elseif (Auth::check() && Auth::user()->role == 'Supervisor') {
            return '/Supervisor';        
        } else {
            return '/Polvorinero';
        }
    }
}