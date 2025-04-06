@extends('app-dashboard')

@section('title', 'Pedidos')

@section('content')

<h1 class="title">Lista de Pedidos</h1>
<table class="w-full table-fixed border-collapse border-">
    <thead>
        <tr>
            <th>Nombre Cliente</th>
            <th>Fecha Pedido</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Precio Total</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
            @foreach($pedidos as $pedido)
                <tr class="p-4 border-b border-white">
                    <td class="p-4">{{ $pedido->usuarios?->name ?? 'No asignado' }}</td>
                    <td class="p-4">{{ $pedido->created_at }}</td>
                    <td class="p-4">
                        @foreach($pedido->productos as $producto)
                            {{ $producto->name }}<br>
                        @endforeach
                    </td>
                    <td class="text-center p-4">
                        @foreach($pedido->productos as $producto)
                            {{ $producto->pivot->quantity }}<br>
                        @endforeach
                    </td class="p-4">
                    <td class="text-center">
                        @foreach($pedido->productos as $producto)
                            ${{ number_format($producto->price, 2) }}<br>
                        @endforeach
                    </td>
                    <td class="text-center p-4">${{ number_format($pedido->productos->sum(function($producto) { return $producto->price * $producto->pivot->quantity; }), 2) }}</td>
                    <td class="p-4">{{ $pedido->status === 0 ? 'Pendiente de envío' : ($pedido->status === 1 ? 'Enviado' : 'No asignado') }}</td>
                    <td class="p-4 flex flex-col">
                        <a class="button text-lg" href="{{ route('pedido.changeStatus', $pedido->id) }}">Cambiar Estado</a>
                        <a class="button text-lg" href="{{ route('pedido.generarPDF', $pedido->id) }}">Generar PDF</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

@endsection
