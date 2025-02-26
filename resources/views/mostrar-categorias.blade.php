<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Categorías Activas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="mt-4">
    <a href="{{ route('categoria.create') }}" class="btn btn-primary">Crear Categoría</a>
    <a href="{{ route('categoria.showDeactivated') }}" class="btn btn-secondary">Ver Categorías Desactivadas</a>
</div>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Categorías</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->name }}</td>
                    <td>
                        <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('categoria.deactivate', $categoria->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">Desactivar</button>
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