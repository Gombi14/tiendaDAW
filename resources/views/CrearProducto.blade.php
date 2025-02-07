<form action="#" method="POST">
    @csrf
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>
    <div>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
    </div>
    <div>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>
    </div>
    <div>
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required>
    </div>
    <div>
        <label for="destacado">Destacado:</label>
        <input type="checkbox" id="destacado" name="destacado">
    </div>
    <div>
        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria" required>
            <option value="">Seleccione una categoría</option>
            <!-- Aquí puedes agregar las opciones de categorías -->
        </select>
    </div>
    <div>
        <button type="submit">Crear Producto</button>
    </div>
</form>