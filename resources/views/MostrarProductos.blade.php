<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Productos</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>Stock</th>
                    <th>Destacado</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->name }}</td>
                    <td>{{ $producto->description }}</td>
                    <td>{{ $producto->price }}</td>
                    <td>{{ $producto->stock}}</td>
                    <td>{{ $producto->featured}}</td>
                    <td>{{ $producto->category_id}}</td>
                    <td>
                        <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('producto.deactivate', $producto->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Desactivar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('principalAdmin') }}" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>