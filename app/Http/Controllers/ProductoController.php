<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::where('active', true)->with('categoria')->get();
        return view('pages.mostrar-productos', compact('productos'));
    }

    public function showPrincipal()
    {
        //mostrara los productos que en el campo featured sea 1 y esten activos
        $productos = Producto::where('active', true)->where('featured', true)->with('categoria')->get();
        return view('pages.principal', compact('productos'));
    }

    public function getAll(Request $request)
    {
        $filter = $request->input('filter');
        $productos = Producto::where('active', true);

        if ($filter) {
            $productos->where('name', 'like', '%' . $filter . '%');
        }

        $productos = $productos->with('categoria')->get();

        return response()->json($productos);
    }

    public function showDeactivated()
    {
        $productos = Producto::where('active', false)->with('categoria')->get();
        return view('pages.mostrar-productos-desactivados', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categorias = Categoria::all();
        return view(('pages.crear-producto'), compact('categorias'));
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
            'stock' => 'required|integer',
            'featured' => 'sometimes|boolean', // No será obligatorio
            'category_id' => 'required|integer',
            
            
            
        ]);

        // Create a new product instance and save it to the database
        $producto = new Producto();
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->price = $request->price;
        $producto->stock = $request->stock;
        $producto->featured = $request->has('featured'); // Devuelve true o false
        $producto->category_id = $request->category_id;
        
        $producto->save();
        

        // Redirect to a specific route with a success message
        return redirect()->route('producto.index')->with('success', 'Producto creado exitosamente');
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
            $producto = Producto::findOrFail($id);
            $categorias = Categoria::all();
            return view('pages.editar-producto', compact('producto', 'categorias'));
        }
        
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'featured' => 'sometimes|boolean', // No será obligatorio
            'category_id' => 'required|integer',

        ]);
        $producto = Producto::findOrFail($id);
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->price = $request->price;
        $producto->stock = $request->stock;
        $producto->featured = $request->has('featured'); // Devuelve true o false
        $producto->category_id = $request->category_id;
        
        $producto->save();

        return redirect()->route('producto.index')->with('success', 'Categoria actualizada exitosamente');
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
        $producto = Producto::findOrFail($id);
        $producto->active = false;
        $producto->save();

        return redirect()->route('producto.index')->with('success', 'Producto desactivado exitosamente');
    }
    

    public function activate(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->active = true;
        $producto->save();

        return redirect()->route('producto.showDeactivated')->with('success', 'Producto activado exitosamente');
    }
}

