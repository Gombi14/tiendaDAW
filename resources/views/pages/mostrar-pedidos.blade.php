@extends('app-dashboard')

@section('title', 'Pedidos')

@section('content')

<body>
    <h1>Lista de Pedidos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Nombre Cliente</th>
                <th>Fecha Pedido</th>
                <th>Productos</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
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
                            {{ $producto->name }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($pedido->productos as $producto)
                            {{ $producto->pivot->quantity }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($pedido->productos as $producto)
                            ${{ number_format($producto->price, 2) }}<br>
                        @endforeach
                    </td>
                    <td>${{ number_format($pedido->productos->sum(function($producto) { return $producto->price * $producto->pivot->quantity; }), 2) }}</td>
                    <td>{{ $pedido->delivery_date ?? 'Sin Fecha de envío' }}</td>
                    <td>{{ $pedido->status === 0 ? 'Pendiente de envío' : ($pedido->status === 1 ? 'Enviado' : 'No asignado') }}</td>
                    <td>
                        <a href="{{ route('pedido.changeStatus', $pedido->id) }}">Cambiar Estado</a>
                        <a href="{{ route('pedido.generarPDF', $pedido->id) }}">Generar PDF</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

@endsection
