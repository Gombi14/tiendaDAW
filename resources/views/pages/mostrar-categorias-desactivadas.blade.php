@extends('app-dashboard')

@section('title', 'Dashboard')

@section('content')
@if ($categorias->isEmpty())

        <h1 colspan="3" class="text-3xl">No hay categorias para mostrar.</h1><br>
        <div class="min-h-[60vh] flex items-center justify-center">
            <a href="{{ route('categoria.index') }}" class="button w-[50%] text-center">Volver a categorias activas</a>
        </div>
        
        
    @elseif ($categorias->isNotEmpty())
<div class="flex justify-center w-full">
    <div class="w-[60%]">
        <table class="table table-striped w-full">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td class="p-4 text-center">{{ $categoria->id }}</td>
                    <td class="p-4 text-center">{{ $categoria->name }}</td>
                    <td class="p-4 text-center">
                        <form action="{{ route('categoria.activate', $categoria->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="button">Activar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('categoria.index') }}" class="button">Volver a categorias activas</a>
    </div>
</div>
@endif
@endsection