@extends('app')

@section('title', 'Productos')

@section('content')


<h1 class="text-3xl mb-6">Productos</h1>

<input type="text" id="search" placeholder="Buscar producto" class="p-2 rounded-lg border border-gray-300 mb-4">
<select class="p-2 rounded-lg bg-white min-h-[42px] border border-gray-300 mb-4" name="categorias" id="categorias-select">
    <option value="">Todas las categorías</option>
    @foreach($categorias as $categoria)
        <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
    @endforeach
</select>
<button id="apply-filters" class="rounded-lg bg-yellow-400 p-2 text-white hover:bg-yellow-300">Aplicar filtros</button>
<container id="productos" class="flex flex-wrap gap-4">
   
</container>

@vite(['resources/js/productos.js'])

@endsection