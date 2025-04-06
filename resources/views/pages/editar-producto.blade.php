@extends('app-dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="container">
    <h2 class="text-3xl mb-3">Editar Producto</h2>
    <form action="{{ route('producto.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
                
        <div class="form-group">
            <label for="name">Nombre del Producto:</label>
            <input class="input" type="text" class="form-control" id="name" name="name" value="{{ $producto->name }}" required>
        </div>
        
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea class="form-control input" id="description" name="description" required>{{ $producto->description }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input class="input" type="number" id="price" name="price" step="0.1" value="{{ $producto->price }}" required>
        </div>
        
        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input class="input" type="number" class="form-control" id="stock" name="stock" value="{{ $producto->stock }}" required>
        </div>
        <div>
            <label for="featured">Destacado:</label>
            <input type="hidden" name="featured" value="0">
            <input type="checkbox" id="featured" name="featured" value="1" {{ $producto->featured ? 'checked' : '' }}>
        </div>
        <div>
            <label for="category_id">Categoría:</label>
            <select class="input" id="category_id" name="category_id" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $producto->category_id == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->name }}
                </option>
                @endforeach
            </select>
            
            
        </div>
        <div class="form-group">
            <label for="image">Imagen:</label>
            <input class="input" type="file" class="form-control" id="image" name="image" value="{{ $producto->image }}" required>
        </div>
        
        <button type="submit" class="button">Actualizar Producto</button>
    </form>
</div>

@endsection