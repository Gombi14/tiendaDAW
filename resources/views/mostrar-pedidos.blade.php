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
                <th>Total</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->nombre_cliente }}</td>
                    <td>{{ $pedido->fecha_pedido }}</td>
                    <td>{{ $pedido->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>