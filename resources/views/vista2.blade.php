<form action="{{ route('categoria.store') }}" method="POST">
    @csrf
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>S
    </div>
    <div>
        <button type="submit">Crear Categoría</button>
    </div>
</form>