<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $usuario = Usuario::create([
            'name' => $request->nombre,
            'surname' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Se encripta correctamente
            'phone' => null,
            'address' => null,
            'role' => 'comprador'
        ]);

        // Iniciar sesión automáticamente
        Auth::login($usuario);

        // Guardar datos en sesión
        Session::put('name', Auth::user()->name);
        Session::put('email', Auth::user()->email);
        Session::put('role', Auth::user()->role);

        return redirect('/'); // Redirigir a la página principal
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
