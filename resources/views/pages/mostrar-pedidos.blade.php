@extends('app-dashboard')

@section('title', 'Pedidos')

@section('content')

<h1 class="title">Lista de Pedidos</h1>
<table class="w-full table-fixed border-collapse border-">
    <thead>
        <tr>
            <th>ID Pedido</th>
            <th>Nombre Cliente</th>
            <th>Fecha Pedido</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Precio Total</th>
            <th>Fecha de Entrega</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->usuarios?->name ?? 'No asignado' }}</td>
                <td>{{ $pedido->created_at }}</td>
                <td>
                    @foreach($pedido->productos as $producto)
                        <td>{{ $producto->name }}</td>
                    @endforeach
                </td>
                <td>
                    @foreach($pedido->productos as $producto)
                        <td>{{ $producto->pivot->quantity }}</td>
                    @endforeach
                </td>
                <td>
                    @foreach($pedido->productos as $producto)
                        <td>{{ $producto->price }}</td>
                    @endforeach
                </td>
                <td>{{ $pedido->productos->sum(function($producto) { return $producto->price* $producto->pivot->quantity; }) }}</td>
                <td>{{ $pedido->delivery_date ?? 'Mondongo'}}</td>
                <td>{{ $pedido->status === 0 ? 'Pendiente de envío' : ($pedido->status === 1 ? 'Enviado' : 'No asignado') }}</td>
                <td>
                <a href="{{ route('pedido.changeStatus', $pedido->id) }}">Cambiar Estado</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection