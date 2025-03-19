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
        return view('pages.carrito', compact('cartDetails'));
    }

    public function updateCart(Request $request){
        $productId = $request->id;
        $quantity = $request->cantidad;

        if(Auth::check()){
            $cartItem = Carrito::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->first();
            
            $cartItem->quantity = $quantity;
            $cartItem->save();
    
            return response()->json(['success' => true]);
        }else{
            $cart = Cookie::get('cart');
            $cart = $cart ? json_decode($cart, true) : [];
            
            $updated = false;
            foreach ($cart as &$item) { 
                if ($item['product_id'] == $productId) {
                    $item['quantity'] = $quantity; 
                    $updated = true;
                    break;
                }
            }
            
            if (!$updated) {
                return response()->json(['success' => false, 'message' => 'Item not found in cart'], 404);
            }

            Cookie::queue('cart', json_encode($cart), 2628000);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 400);
    }

    public function deleteCartItem(Request $request, $productId){
        if (Auth::check()) {
            // Buscar el producto en el carrito del usuario autenticado
            $cartItem = Carrito::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->first();
    
            if ($cartItem) {
                $cartItem->delete();
                return redirect()->back()->with('success', 'Producto eliminado del carrito.');
            } else {
                return redirect()->back()->with('error', 'El producto no fue encontrado.');
            }
        } else {
            // Si el usuario no está autenticado, eliminar del carrito en cookies
            $cart = Cookie::get('cart');
            $cart = $cart ? json_decode($cart, true) : [];
    
            $cart = array_filter($cart, function ($item) use ($productId) {
                return $item['product_id'] != $productId;
            });
    
            // Guardar la cookie actualizada
            Cookie::queue(Cookie::make('cart', json_encode(array_values($cart)), 60 * 24 * 7));
    
            return redirect()->back()->with('success', 'Producto eliminado del carrito.');
        }
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
                    $item['quantity'] += $quantity; 
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
            Cookie::queue('cart', json_encode($cart), 2628000);
        }
        return redirect()->route('categoria.tienda');
    }
}