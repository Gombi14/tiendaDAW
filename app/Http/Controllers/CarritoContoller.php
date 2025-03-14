<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CarritoContoller extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //>>>>>>> origin/main

        if(Auth::check()){
            $cart = Carrito::where('user_id', Auth::id())->get();

            $cart = $cart ? json_decode($cart, true) : [];

            $productIds = array_column($cart, 'product_id');
        
            // Obtener los productos desde la base de datos
            $products = Producto::whereIn('id', $productIds)->get();
    
    
            // Crear una respuesta con cantidad del carrito y datos del producto
            $cartDetails = [];
            foreach ($products as $product) {
                // Buscar la cantidad desde el carrito
                $quantity = 0;
                foreach ($cart as $item) {
                    if ($item['product_id'] == $product->id) {
                        $quantity = $item['quantity'];
                    }
                }
    
                // Agregar a la respuesta
                $cartDetails[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'price' => $product->price,
                    'quantity' => $quantity
                ];
            }


        }else{
            
            $cart = Cookie::get('cart');
            $cart = $cart ? json_decode($cart, true) : [];
        
            // Extraer solo los IDs de los productos
            $productIds = array_column($cart, 'product_id');
        
            // Obtener los productos desde la base de datos
            $products = Producto::whereIn('id', $productIds)->get();
    
    
            // Crear una respuesta con cantidad del carrito y datos del producto
            $cartDetails = [];
            foreach ($products as $product) {
                // Buscar la cantidad desde el carrito
                $quantity = 0;
                foreach ($cart as $item) {
                    if ($item['product_id'] == $product->id) {
                        $quantity = $item['quantity'];
                    }
                }
    
                // Agregar a la respuesta
                $cartDetails[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'price' => $product->price,
                    'quantity' => $quantity
                ];
            }
    
        }
        Log::debug('Cart Details:', $cartDetails);
        return view('pages.carrito', compact('cartDetails'));
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
        //
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
    /**
     * Adds a prduct to cart.
     */
    public function addToCart(Request $request){
        $productId = $request->id;
        $quantity = $request->cantidad;

        if(Auth::check()){
        
            $cartItem = Carrito::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->first();

            if ($cartItem) {
                // Si el producto ya está en el carrito, aumentar la cantidad
                $cartItem->increment('quantity', $quantity);
            } else {
                // Si el producto no está en el carrito, crearlo
                Carrito::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId,
                    'quantity' => $quantity
                ]);
            }
        
        }else{

            // Obtener la cookie y decodificarla
            $cart = Cookie::get('cart');
            $cart = $cart ? json_decode($cart, true) : [];
        
            // Verificar si el producto ya existe en el carrito
            $found = false;
            foreach ($cart as &$item) { 
                if ($item['product_id'] == $productId) {
                    $item['quantity'] += $quantity; // Sumar cantidad si ya existe
                    $found = true;
                    break;
                }
            }
        
            if (!$found) {
                $cart[] = [
                    'product_id' => $productId,
                    'quantity' => $quantity
                ];
            }
            Cookie::queue('cart', json_encode($cart), 2628000); // Cookie válida por 5 años    
            return redirect()->route('categoria.tienda');
            
        }
    }
}