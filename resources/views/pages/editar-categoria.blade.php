@extends('app-dashboard')

@section('title', 'Dashboard')

@section('content')
    
<div class="container">
    <h1>Editar Categoría</h1>
    <form action="{{ route('categoria.update', $categoria->id) }}" method="POST">
        @csrf
       
        <div class="form-group">
            <label for="name">Nombre de la Categoría</label>
            <input type="text" name="name" id="name" class="input" value="{{ $categoria->name }}" required>
        </div>
        <button type="submit" class="button">Guardar Cambios</button>
        <button type="reset" class="button">Descartar Cambios</button>
        <a href="{{ route('categoria.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>

@endsection
