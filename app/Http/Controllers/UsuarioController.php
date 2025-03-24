<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showRegister(){
        if (Auth::check()) {
            return redirect('/');
        }
        return view('register');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (empty($request->nombre) || empty($request->contraseña) || empty($request->apellido) || empty($request->email)) {
            return back()->withErrors(['obligatorios'=>'Todos los campos son obligatorios']);
        }
        $nombre = $request->nombre;
        $contraseña = Hash::make($request->contraseña);
        $apellido = $request->apellido;
        $email = $request->email;

        if (Usuario::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'El email está en uso']);
        }
        Usuario::create([
            'name' => $nombre,
            'password' => $contraseña,
            'surname' => $apellido,
            'phone' => null,
            'email' => $email,
            'address' => null,
            'role' => 'comprador'
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
