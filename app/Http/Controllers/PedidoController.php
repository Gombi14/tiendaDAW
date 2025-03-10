<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Usuario;

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
        if($pedido->status == 0) {
            $pedido->status = 1;
            $pedido->delivery_date = now();
        } else {
            $pedido->status = '0';
            $pedido->delivery_date = null;
        }
        
        $pedido->save();

        return redirect()->route('pedido.index')->with('success', 'Estado del pedido actualizado exitosamente');
    }
}
