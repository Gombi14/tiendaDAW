<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Pedidos</title>
</head>
<body>
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
                    <td>{{ $pedido->usuario->name }}</td>
                    <td>{{ $pedido->created_at }}</td>
                    <td>
                        @foreach($pedido->productos as $producto)
                            <p>{{ $producto->name }} - Precio: {{ $producto->price }} - Cantidad: {{ $producto->pivot->quantity}}</p>
                        @endforeach
                    </td>
                    <td>{{ $pedido->productos->sum('pivot.quantity') }}</td>
                    <td>{{ $pedido->productos->sum(function($producto) { return $producto->price* $producto->pivot->quantity; }) }}</td>
                    <td>{{ $pedido->status }}</td>
                    <td>{{ $pedido->delivery_date}}</td>
                    <td>
                    <a href="{{ route('pedidos.changeStatus', $pedido->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>