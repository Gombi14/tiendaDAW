@extends('app-dashboard')

@section('title', 'Dashboard')

@section('content')



<form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Nombre:</label>
        <input class="text-black" type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    
    <div>
        <label for="description">Descripción:</label>
        <textarea class="text-black" id="description" name="description" required>{{ old('description') }}</textarea>
        @error('description')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    
    <div>
        <label for="price">Precio:</label>
        <input class="text-black" type="number" id="price" name="price" step="0.1" value="{{ old('price') }}" required>
        @error('price')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    
    <div>
        <label for="stock">Stock:</label>
        <input class="text-black" type="number" id="stock" name="stock" value="{{ old('stock') }}" required>
        @error('stock')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    
    <div>
        <label for="featured">Destacado:</label>
        <input type="hidden" name="featured" value="0">
        <input type="checkbox" id="featured" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
        
    </div>
    
    <div>
        <label for="category_id">Categoría:</label>
        <select class="text-black" id="category_id" name="category_id" required>
            <option value="">Seleccione una categoría</option>
            @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ old('category_id') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->name }}
            </option>
            @endforeach
        </select>
        @error('category_id')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="image">Imagen:</label>
        <input class="text-black" type="file" id="image" name="image" accept="image/*" required>
        @error('image')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    
    <div>
        <button type="submit">Crear Producto</button>
        <a href="{{ route('producto.index') }}">Volver</a>
    </div>
</form>

@endsection