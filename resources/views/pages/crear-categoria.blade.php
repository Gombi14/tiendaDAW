@extends('app-dashboard')

@section('title', 'Dashboard')

@section('content')

<a href="{{ route('categoria.index') }}" class="bg-blue-300 p-3 rounded-lg text-white">volver</a>
<form action="{{ route('categoria.store') }}" method="POST">
    @csrf
    <div class="mt-4">
        <label for="nombre">Nombre:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <button type="submit">Crear Categoría</button>
    </div>
</form>

@endsection