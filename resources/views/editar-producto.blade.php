
<div class="container">
    <h2>Editar Producto</h2>
    <form action="{{ route('producto.update', $producto->id) }}" method="POST">
        @csrf
        
        
        <div class="form-group">
            <label for="name">Nombre del Producto:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $producto->name }}" required>
        </div>
        
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $producto->description }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $producto->price }}" required>
        </div>
        
        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $producto->stock }}" required>
        </div>
        <div>
            <label for="featured">Destacado:</label>
            <input type="hidden" name="featured" value="0">
            <input type="checkbox" id="featured" name="featured" value="1" {{ $producto->featured ? 'checked' : '' }}>
        </div>
        <div>
            <label for="category_id">Categoría:</label>
            <select id="category_id" name="category_id" required>
                <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $producto->category_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->name }}
                        </option>
                    @endforeach
            </select>

        
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>
