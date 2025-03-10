@extends('app-dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="container">
    <h1>Productos Desactivados</h1>
    @if ($productos->isEmpty())
        <tr>
            <td colspan="3" class="text-center">No hay productos para mostrar.</td><br>
        </tr>
        <tr>
            <a href="{{ route('producto.index') }}" class="btn btn-primary">Volver a productos activos</a>
        </tr>
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