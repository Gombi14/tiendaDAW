@extends('app-dashboard')

@section('title', 'Categorias')

@section('content')

<div class="flex w-full justify-between gap-3 items-center">
    <h1 class="text-3xl font-bold">Lista de Categorías</h1>
    <div class="flex gap-3">
        <a href="{{ route('categoria.create') }}">
            <button class="button">
                Crear Categoría
            </button>
        </a>
        <a href="{{ route('categoria.showDeactivated') }}">
            <button class="button">
                Ver Categorías Desactivadas
            </button>
        </a>
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
    <table class="w-full text-left">
        <thead>
            <tr>
                <th class="text-center">Identificador</th>
                <th>Nombre</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>     
            @foreach($categorias as $categoria)
            <tr>
                <td class="text-center">{{ $categoria->id }}</td>
                <td>{{ $categoria->name }}</td>
                <td class="flex gap-3 p-3 justify-center">
                    <a href="{{ route('categoria.edit', $categoria->id) }}">
                        <button class="button">
                            Editar
                        </button>
                    </a>
                    <form action="{{ route('categoria.deactivate', $categoria->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="button">Desactivar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection