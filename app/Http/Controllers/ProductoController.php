<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CrearProducto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            //'image' => 'required|image',
            'stock' => 'required|integer',
            'featured' => 'required|boolean',
            //'category_id' => 'required|integer',
            
            
            
        ]);

        // Create a new product instance and save it to the database
        $producto = new Producto();
        $producto->nombre = $request->input('name');
        $producto->descripcion = $request->input('description');
        $producto->precio = $request->input('price');
        //$producto->imagen = $request->file('image')->store('public');
        $producto->stock = $request->input('stock');
        $producto->destacado = $request->input('featured');
        //$producto->categoria_id = $request->input('category_id');
        
        $producto->save();

        // Redirect to a specific route with a success message
        return redirect()->route('/')->with('success', 'Producto creado exitosamente');
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
