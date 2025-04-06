@extends('app-dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="container">
    <h1 class="text-3xl">Productos Desactivados</h1>
    @if ($productos->isEmpty())
        <h1 colspan="3" class="text-2xl">No hay productos para mostrar.</h1><br>
        <div class="h-[60vh] flex items-center justify-center">
            <a href="{{ route('producto.index') }}" class="button w-[50%] text-center">Volver a productos activos</a>
        </div>
    @elseif ($productos->isNotEmpty())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Destacado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->name }}</td>
                <td>{{ $producto->description }}</td>
                <td>{{ $producto->price }}</td>
                <td>{{ $producto->featured}}</td>
                <td>{{ $producto->categoria->name }}</td>
                <td>
                    <form action="{{ route('producto.activate', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Activar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('producto.index') }}" class="btn btn-primary">Volver a productos activos</a>
</div>
@endif


@endsection