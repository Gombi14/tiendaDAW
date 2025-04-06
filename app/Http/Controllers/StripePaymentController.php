<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Pedido;
use App\Models\Items;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Carrito;
use Illuminate\Support\Facades\Cookie;

class StripePaymentController extends Controller
{
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

    public function session(Request $request)
{
    Stripe::setApiKey(config('stripe.secret'));

    $cart = Carrito::where('user_id', Auth::id())->get();
    $lineItems = [];

    foreach ($cart as $item) {
        $producto = Producto::find($item->product_id);

        if ($producto) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => config('stripe.currency'),
                    'product_data' => [
                        'name' => $producto->name,
                    ],
                    'unit_amount' => intval($producto->price * 100), 
                ],
                'quantity' => $item->quantity,
            ];
        }
    }

    if (empty($lineItems)) {
        return redirect()->back()->with('error', 'Tu carrito está vacío.');
    }

    $session = Session::create([
        'payment_method_types' => ['card'], // ⚠️ PayPal solo si lo tienes habilitado
        'line_items' => $lineItems,
        'mode' => 'payment',
        'success_url' => route('checkout.success'),
        'cancel_url' => route('checkout.cancel'),
    ]);

    $pedido = [
        'name'=> $request->nombre,
        'surname'=> $request->apellidos,
        'phone'=> $request->telefono,
        'email'=> $request->email,
        'direction'=> $request->direccion,
    ];

    Log::debug($request);

    Cookie::queue('pedido', json_encode($pedido), 5000000);
    Cookie::queue('pedido_iniciado', true,5000000);

    return redirect($session->url);
}

    public function success()
    {
        //comprovamos si el pedido esta iniciado
        $userID = Auth::id();
    
        if(Cookie::get('pedido_iniciado')==true){
            $cart = Carrito::where('user_id', $userID)->get();
            $cookie = json_decode(Cookie::get('pedido'));
            
            $totalPrice = 0;
            
            foreach ($cart as $item) {
                $producto = Producto::find($item->product_id);
                $totalPrice += $producto['price'] * $item->quantity;
            }


            $pedido = Pedido::create([
                'user_id'       => $userID,
                'total_price'   => $totalPrice,
                'status'        => 0,
                'delivery_date' => null,
                'direction'     => $cookie->direction,
                'phone'         => $cookie->phone,
                'name'          => $cookie->name,
                'surname'       => $cookie->surname,
                'email'         => $cookie->email,
            ]);
            
            foreach($cart as $item){
                Items::create([
                    'order_id'  => $pedido->id,
                    'product_id'=> $item->product_id,
                    'quantity'  => $item->quantity
                ]);
            }

            Carrito::where('user_id', $userID)->delete();
            Cookie::forget('pedido_iniciado');
            Cookie::queue('pedido_completado',true,5000000);
        }
        return redirect('/misPedidos');
    }

    public function cancel()
    {
        return 'Pago cancelado.';
    }
}
