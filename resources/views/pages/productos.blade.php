@extends('app')

@section('title', 'Productos')

@section('content')


<h1 class="text-3xl mb-6">Productos</h1>

<input type="text" id="search" placeholder="Buscar producto" class="p-2 rounded-lg border border-gray-300 mb-4">

<container id="productos" class="flex flex-wrap gap-4">
    <div class="flex flex-col bg-gray-900 gap-4 text-white p-4 rounded-lg" style="min-width: 300px;">
        <h2>Nombre producto</h2>
        <h2 class="text-right">1000€</h2>
    </div>
</container>

@vite(['resources/js/productos.js'])

@endsection