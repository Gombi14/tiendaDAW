<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color:rgb(255, 255, 255); color: #333; }
        .container { width: 100%; border: 1px solid #ddd; padding: 20px; background-color: rgb(255, 255, 255); box-shadow: 0 2px 5px rgb(255, 255, 255); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color:rgba(0, 0, 0, 1); color: #fff; }
        .total { font-weight: bold; color:rgba(0, 0, 0, 1); }
        h2, h3 { color:rgba(0, 0, 0, 1); }
        .logo { text-align: left; margin-bottom: 20px; display: flex; align-items: center; }
        .logo img { max-width: 40px; }
        .title { text-align: center; font-size: 24px; font-weight: bold; margin-top: 10px; color:rgba(0, 0, 0, 1); }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ 'img/logo.png' }}" alt="Logo de la Tienda">
            <h2 class="title">El Garaje de Rick</h2>
        </div>
      
        <h2>Factura de Compra</h2>
        <p><strong>Cliente:</strong> {{ \App\Models\Usuario::find($pedido['user_id'])->name}}</p>
        <p><strong>Fecha de Pedido:</strong> {{ $pedido['created_at'] }}</p>
        <p><strong>Estado del Pedido:</strong> {{ $pedido['status'] == 0 ? 'Pendiente de Envío' : 'Enviado' }}</p>
        <p><strong>Fecha de Entrega:</strong> {{ $pedido['delivery_date'] ?? 'No enviado' }}</p>

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedido['productos'] as $producto)
                <tr>
                    <td>{{ $producto['name'] }}</td>
                    <td>{{ $producto->pivot['quantity'] }}</td>
                    <td>{{ number_format($producto['price'], 2) }} €</td>
                    <td>{{ number_format($producto->pivot['quantity'] * $producto['price'], 2) }} €</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3 class="total">Total a Pagar: ${{ number_format($pedido->productos->sum(function($producto) { return $producto->price * $producto->pivot->quantity; }), 2) }}</td> €</h3>
        <footer style="margin-top: 20px; text-align: center; font-size: 14px; color: #555;">
            <p>Gràcies per la seva compra</p>
            <p>Per més informació, contacti amb nosaltres a través de la nostra pàgina web o al següent correu electrònic: admin@gmail.com</p>
            <p>El Garaje de Rick - Tots els drets reservats &copy; {{ date('Y') }}</p>
        </footer>
    </div>
</body>
</html>
