@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Producto</h2>
    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        
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
        
        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>
@endsection