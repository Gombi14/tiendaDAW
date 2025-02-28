@extends('app-dashboard')

@section('title', 'Productos')

@section('content')


<div class="flex w-full justify-between gap-3 items-center">
    <h1 class="text-3xl font-bold">Lista de Productos</h1>
    <div>
        <button class="bg-blue-300 p-3 rounded-lg text-white">
            <a href="{{ route('producto.create') }}">Crear Producto</a>
        </button>
        <button class="bg-blue-300 p-3 rounded-lg text-white">
            <a href="{{ route('producto.showDeactivated') }}">Ver Productos Desactivados</a>
        </button>
    </div>
</div>
<div class="flex flex-col justify-center mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Destacado</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td class="text-center">{{ $producto->id }}</td>
                <td>{{ $producto->name }}</td>
                <td>{{ $producto->description }}</td>
                <td class="text-center">{{ $producto->price }}€</td>
                <td class="text-center">{{ $producto->stock}}</td>
                <td class="text-center">
                    @if ($producto->featured == 1)
                        Sí
                    @else
                        No
                    @endif
                </td>
                <td>{{ $producto->categoria->name}}</td>
                <td class="p-3">
                    <div class="flex gap-3 justify-center">
                        <div class="w-1/2">
                            <button class="bg-yellow-500 p-3 rounded-lg w-full text-white">
                                <a href="{{ route('producto.edit', $producto->id) }}">Editar</a>
                            </button>
                        </div>
                        <form  class="w-1/2" action="{{ route('producto.deactivate', $producto->id) }}" method="POST">
                            <div>
                                @csrf
                                <button type="submit" class="bg-red-600 w-full p-3 rounded-lg text-white">Desactivar</button>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection