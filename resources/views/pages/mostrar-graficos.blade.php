@extends('app-dashboard')

@section('title', 'Dashboard')

@section('content')


<body>
    <h1>Productes amb Menys Stock</h1>
    <canvas id="stockCanvas" width="500" height="300"></canvas>
    <h1>Productes més venuts</h1>
    <canvas id="productoCanvas" width="500" height="300"></canvas>
    <h1>Volum de vendas per mes</h1>
    <canvas id="ventasCanvas" class="font-mono" width="1300" height="400"></canvas>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const stockProductos = @json($stockProductos);
        const productosMasVendidos = @json($productosMasVendidos);
        const ventasPorMes = @json($ventasPorMes);

        // Gráfico de productos con menor stock
        if (stockProductos && stockProductos.length > 0) {
            const canvasStock = document.getElementById('stockCanvas');
            if (canvasStock) {
            const ctxStock = canvasStock.getContext('2d');
            ctxStock.clearRect(0, 0, canvasStock.width, canvasStock.height);

            const anchoBarra = 50;
            const espacio = 40;
            const maxAltura = 200;
            const margenIzq = 70;
            const margenInf = 250;

            const stocks = stockProductos.map(prod => prod.stock);
            const nombres = stockProductos.map(prod => prod.name);
            const maxStock = Math.max(...stocks) || 1;

            stockProductos.forEach((producto, i) => {
                let altura = (producto.stock / maxStock) * maxAltura;
                let x = margenIzq + (i * (anchoBarra + espacio));
                let y = margenInf - altura;

                ctxStock.fillStyle = 'rgb(255, 0, 55)';
                ctxStock.fillRect(x, y, anchoBarra, altura);

                ctxStock.fillStyle = 'white';
                ctxStock.font = '14px Arial';
                ctxStock.fillText(producto.stock, x + 15, y - 5);
                ctxStock.fillText(producto.name.substring(0, 8), x, margenInf + 15);
            });

            ctxStock.beginPath();
            ctxStock.moveTo(margenIzq, 50);
            ctxStock.lineTo(margenIzq, margenInf);
            ctxStock.lineTo(450, margenInf);
            ctxStock.stroke();

            ctxStock.fillStyle = 'white';
            ctxStock.font = '16px Arial';
            ctxStock.fillText('Stock', margenIzq - 50, 30);
            ctxStock.fillText('Productos', 400, margenInf + 40);
            } else {
            console.error("Canvas no encontrado");
            }
        }

        // Gráfico de productos más vendidos
        if (productosMasVendidos && productosMasVendidos.length > 0) {
            const canvasProducto = document.getElementById('productoCanvas');
            if (canvasProducto) {
            const ctxProducto = canvasProducto.getContext('2d');
            ctxProducto.clearRect(0, 0, canvasProducto.width, canvasProducto.height);0000

            const anchoBarra = 50;
            const espacio = 40;
            const maxAltura = 200;
            const margenIzq = 70;
            const margenInf = 250;

            const ventas = productosMasVendidos.map(prod => prod.ventas);
            const nombres = productosMasVendidos.map(prod => prod.name);

            const maxVentas = Math.max(...ventas) || 1;

            productosMasVendidos.forEach((producto, i) => {
                let altura = (producto.ventas / maxVentas) * maxAltura;
                let x = margenIzq + (i * (anchoBarra + espacio));
                let y = margenInf - altura;

                ctxProducto.fillStyle = 'rgb(0, 153, 255)';
                ctxProducto.fillRect(x, y, anchoBarra, altura);

                ctxProducto.fillStyle = 'white';
                ctxProducto.font = '14px Arial';
                ctxProducto.fillText(producto.ventas, x + 15, y - 5);
                ctxProducto.fillText(producto.name.substring(0, 8), x, margenInf + 15);
            });

            ctxProducto.beginPath();
            ctxProducto.moveTo(margenIzq, 50);
            ctxProducto.lineTo(margenIzq, margenInf);
            ctxProducto.lineTo(950, margenInf);
            ctxProducto.stroke();

            ctxProducto.fillStyle = 'white';
            ctxProducto.font = '16px Arial';
            ctxProducto.fillText('Ventas', margenIzq - 50, 30);
            ctxProducto.fillText('Productos', 400, margenInf + 40);
            } else {
            console.error("Canvas no encontrado");
            }
        }

        // Gráfico de volumen de ventas por mes
        if (ventasPorMes && ventasPorMes.length > 0) {
            const canvasVentas = document.getElementById('ventasCanvas');
            if (canvasVentas) {
            const ctxVentas = canvasVentas.getContext('2d');
            ctxVentas.clearRect(0, 0, canvasVentas.width, canvasVentas.height);

            const anchoBarra = 50;
            const espacio = 50;
            const maxAltura = 200;
            const margenIzq = 70;
            const margenInf = 250;

            const ventas = ventasPorMes.map(venta => venta.ventas);
            const meses = ventasPorMes.map(venta => venta.month);

            const maxVentas = Math.max(...ventas) || 1;

            ventasPorMes.forEach((venta, i) => {
                let altura = (venta.ventas / maxVentas) * maxAltura;
                let x = margenIzq + (i * (anchoBarra + espacio));
                let y = margenInf - altura;

                ctxVentas.fillStyle = 'rgb(0, 255, 55)';
                ctxVentas.fillRect(x, y, anchoBarra, altura);

                ctxVentas.fillStyle = 'white';
                ctxVentas.font = '14px Arial';
                ctxVentas.fillText(venta.ventas, x + 15, y - 5);
                ctxVentas.fillText(venta.month.substring(0, 10), x, margenInf + 15);
            });

            ctxVentas.beginPath();
            ctxVentas.moveTo(margenIzq, 50);
            ctxVentas.lineTo(margenIzq, margenInf);
            ctxVentas.lineTo(margenIzq + (ventasPorMes.length * (anchoBarra + espacio)), margenInf);
            ctxVentas.stroke();

            ctxVentas.fillStyle = 'white';
            ctxVentas.font = '16px Arial';
            ctxVentas.fillText('Ventas', margenIzq - 50, 30);
            ctxVentas.fillText('Meses', 1100, margenInf + 40);
                } else {
            console.error("Canvas no encontrado");
            }
        }
    });
    </script>
</body>
@endsection