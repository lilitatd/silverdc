<?php

namespace SilverDC\Http\Controllers;

use SilverDC\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = [];
        if (Auth::user()->role == 'SuperAdmin') {
            $users = User::where('role', 'Admin')->get();
        } elseif (Auth::user()->role == 'Admin') {
            $users = User::whereIn('role', ['Supervisor', 'Seccional', 'Polvorinero', 'Operador'])
            ->get();
        }
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|confirmed|min:5',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();
        return redirect()->route('users.index')->with('status', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SilverDC\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
        return view('users.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SilverDC\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SilverDC\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'password' => 'required|confirmed|min:5',
        ]);
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('users.index')->with('status', 'Usuario editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SilverDC\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return 'Eliminado';    }
}
