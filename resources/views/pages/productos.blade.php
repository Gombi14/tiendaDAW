@extends('app')

@section('title', 'Productos')

@section('content')

<h1 class="text-3xl mb-6 text-white">Productos</h1>
<div class="flex gap-6">
    <div class="min-w-[270px] ">
        <nav class="flex flex-col gap-4 w-[250px] bg-boton p-4 mb-3 rounded-lg shadow-[0px_0px_14px_1px_#73FF50] fixed">
            <label for="Buscar producto" class="text-white text-2xl mb-0">Nombre</label>
            <input type="text" id="search" placeholder="Buscar producto" class="input">
            <label for="Buscar producto" class="text-white text-2xl mb-0">Categoria</label>
            <select class="input" name="categorias" id="categorias-select">
                <option value="">Todas las categorías</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                @endforeach
            </select>
            <button id="apply-filters" class="rounded-lg text-2xl bg-boton border-[1px] border-separate border-[#73FF50] p-4 text-[#73ff50] text-white w-full hover:bg-[#555555]">Aplicar filtros</button>
        </nav>
    </div>
    <container id="productos" class="flex flex-wrap ">
       
    </container>
</div>


@vite(['resources/js/productos.js'])

@endsection