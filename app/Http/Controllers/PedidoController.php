<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;
use App\Models\Pedido;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Carrito;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        $pedidos = Pedido::with('usuarios', 'productos')->get();
        return view('pages.mostrar-pedidos', compact('pedidos'));
    }

    public function checkout()
    {
        $cart = Carrito::where('user_id', Auth::id())->get();
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Antes de comprar, tienes que iniciar sesión.');
        }
        if ($cart->isEmpty()) {
            return redirect()->route('carrito.index')->with('warning', 'No tienes productos en el carrito.');
        }

        //obtener el total del pedido y el numero de elemntos dentro del carrito del usuario
        $data = [
            'total' => 0,
            'items' => 0,
        ];
        foreach ($cart as $item) {
            $producto = Producto::find($item->product_id);
            if ($producto) {
                $data['total'] += $producto->price * $item->quantity;
                $data['items'] += $item->quantity;
            }
        }        
        $email = Auth::user()->email;
        return view('pages.checkout', compact('data','email'));
    }

    public function misPedidos(){
        
        $pedidos = Pedido::where('user_id', Auth::id())->get();

        Log::debug($pedidos);

        if(Cookie::get('pedido_completado')==true){
            Cookie::forget('pedido_completado');
            return view('pages.misPedidos', compact('pedidos'));      
        }
        
        return view('pages.misPedidos', compact('pedidos'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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

    public function changeStatus(string $id)
    {
        $pedido = Pedido::findOrFail($id);
        if($pedido->status == 0) { // 0 = Pendiente de envío, 1 = Enviado
            $pedido->status = 1;
            $pedido->delivery_date = now()->addhours(1);
        } else {
            $pedido->status = 0;
            $pedido->delivery_date = null;
        }
        
        $pedido->save();

        return redirect()->route('pedido.index')->with('success', 'Estado del pedido actualizado exitosamente');
    }

    public function generarPDF(string $id){

        $pedido = Pedido::with('productos')->findOrFail($id);

        $pdf = PDF::loadView('pages.pdf-factura', compact('pedido'));

        return $pdf->download("factura_pedido_{$id}.pdf");

    }
}
