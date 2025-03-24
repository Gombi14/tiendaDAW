<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Categoria;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::where('active', true)->get();
        return view('pages.mostrar-categorias', compact('categorias'));
    }

    public function tienda()
    {
        $categorias = Categoria::where('active', true)->get();
        return view('pages.productos', compact('categorias'));
    }

    public function showDeactivated()
    {
        $categorias = Categoria::where('active', false)->get();
        return view('pages.mostrar-categorias-desactivadas', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.crear-categoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            
        ]);

        $categoria = new Categoria();
        $categoria->name = $request->name;
        //dd($request->all());

        $categoria->save();

        return redirect()->route('principal-admin')->with('success', 'Categoria creada correctamente');
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
        $categoria = Categoria::findOrFail($id);
        return view(('pages.editar-categoria'), compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->name = $request->name;
        $categoria->save();

        return redirect()->route('categoria.index')->with('success', 'Categoria actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function deactivate(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->active = false;
        $categoria->save();

        return redirect()->route('categoria.index')->with('success', 'Producto desactivado exitosamente');
    }
    
    public function activate(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->active = true;
        $categoria->save();

        return redirect()->route('categoria.showDeactivated')->with('success', 'Producto desactivado exitosamente');
    }
}


