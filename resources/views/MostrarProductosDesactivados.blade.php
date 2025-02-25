<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Productos Activos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<div class="container">
    <h1>Productos Desactivados</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoría</th>
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
                <td>{{ $producto->category->name }}</td>
                <td>
                    <a href="{{ route('producto.activate', $producto->id) }}" class="btn btn-success">Activar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="producto.index" class="btn btn-primary">Volver a productos activos</a>
</div>