@extends('app-dashboard')

@section('title', 'Categorias')

@section('content')

<div class="flex w-full justify-between gap-3 items-center">
    <h1 class="text-3xl font-bold">Lista de Categorías</h1>
    <div class="flex gap-3">
        <button class="bg-blue-300 p-3 rounded-lg text-white">
            <a href="{{ route('categoria.create') }}">Crear Categoría</a>
        </button>
        <button class="bg-blue-300 p-3 rounded-lg text-white">
            <a href="{{ route('categoria.showDeactivated') }}">Ver Categorías Desactivadas</a>
        </button>
    </div>
</div>
@if ($categorias->isEmpty())
        <tr>
            <td colspan="3" class="text-center">No hay categorias para mostrar.</td><br>
        </tr>
        <tr>
            <a href="{{ route('categoria.index') }}" class="btn btn-primary">Volver a categorias activas</a>
        </tr>
@elseif ($categorias->isNotEmpty())
<div class="container mt-5">
    <table class="border border-collapse border-gray-300 w-full text-left">
        <thead class="bg-gray-200">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>     
            @foreach($categorias as $categoria)
            <tr>
                <td class="text-center">{{ $categoria->id }}</td>
                <td>{{ $categoria->name }}</td>
                <td class="flex gap-3 p-3">
                    <a href="{{ route('categoria.edit', $categoria->id) }}">
                        <button class="bg-green-300 p-3 rounded-lg text-white">
                            Editar
                        </button>
                    </a>
                    <form action="{{ route('categoria.deactivate', $categoria->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="bg-blue-300 p-3 rounded-lg text-white">Desactivar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection