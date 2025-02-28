@extends('app-dashboard')

@section('title', 'Dashboard')

@section('content')

<h1>Lista de Pedidos</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID Pedido</th>
            <th>Nombre Cliente</th>
            <th>Fecha Pedido</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
            <th>Estado</th>
            <th>Fecha Entrega</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->comprador->nombre_cliente }}</td>
                <td>{{ $pedido->fecha_pedido }}</td>
                <td>
                    @foreach($pedido->productos as $producto)
                    <p>{{ $producto->nombre }} - Precio: {{ $producto->precio }} - Cantidad: {{ $producto->pivot->cantidad }}</p>
                    @endforeach
                </td>
                <td>{{ $pedido->productos->sum('pivot.cantidad') }}</td>
                <td>{{ $pedido->productos->sum(function($producto) { return $producto->precio * $producto->pivot->cantidad; }) }}</td>
                <td>{{ $pedido->status }}</td>
                <td>{{ $pedido->fecha_entrega }}</td>
                <td>
                    <a href="{{ route('pedidos.changeStatus', $pedido->id) }}">Editar</a>
                    <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                        @csrf
                        <button type="submit">Cambiar Estado</button>
                    </form>
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection