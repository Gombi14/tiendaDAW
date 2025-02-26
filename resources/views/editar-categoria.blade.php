<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Editar Categoría</h1>
        <form action="{{ route('categoria.update', $categoria->id) }}" method="POST">
            @csrf
           
            <div class="form-group">
                <label for="name">Nombre de la Categoría</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $categoria->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <button type="reset" class="btn btn-danger">Descartar Cambios</button>
            <a href="{{ route('categoria.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</body>
</html>
