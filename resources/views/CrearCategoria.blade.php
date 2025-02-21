<form action="{{ route('categoria.store') }}" method="POST">
    @csrf
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <button type="submit">Crear Categoría</button>
    </div>
</form>