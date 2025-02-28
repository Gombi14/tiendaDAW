@extends('app-dashboard')

@section('title', 'Dashboard')

@section('content')

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $categoria)
        <tr>
            <td>{{ $categoria->id }}</td>
            <td>{{ $categoria->name }}</td>
            <td>
                <form action="{{ route('categoria.activate', $categoria->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">Activar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
<a href="{{ route('categoria.index') }}" class="btn btn-primary">Volver a categorias activas</a>

@endsection