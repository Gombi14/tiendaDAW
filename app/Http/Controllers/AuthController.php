<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Carrito;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            Session::put('name', Auth::user()->name);
            Session::put('email', Auth::user()->email);
            Session::put('role', Auth::user()->role);
            
            if (Cookie::get('cart')) {
                $cart = json_decode(Cookie::get('cart'), true) ?? [];
    
                foreach ($cart as $item) {
                    $cartItem = Carrito::where('user_id', Auth::id())
                        ->where('product_id', $item['product_id'])
                        ->first();
    
                    if ($cartItem) {
                        // Si el producto ya está en el carrito, sumamos la cantidad
                        $cartItem->quantity += $item['quantity'];
                        $cartItem->save();
                    } else {
                        // Si el producto no está, lo agregamos
                        Carrito::create([
                            'user_id' => Auth::id(),
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity']
                        ]);
                    }
                }
            }

            Cookie::queue(Cookie::forget('cart'));
            return redirect('/'); // Redirigir después de iniciar sesión
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
