<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="mt-4">
    <a href="{{ route('producto.create') }}" class="btn btn-primary">Crear Producto</a>
    <a href="{{ route('producto.showDeactivated') }}" class="btn btn-secondary">Ver Productos Desactivados</a>
</div>
    <div class="container">
        <h1>Lista de Productos</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
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
                    <td>{{ $producto->categoria->name}}</td>
                    <td>
                        <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('producto.deactivate', $producto->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Desactivar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('principal-admin') }}" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>