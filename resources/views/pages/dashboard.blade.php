@extends('app-dashboard')

@section('title', 'Dashboard')

@section('content')
    
<div class="w-full text-center mt-5">
    <h1 class="text-4xl">Dashboard</h1>
    <div class="mt-10 flex gap-4 w-full justify-center">
        <a href="/mostrarCategorias" class="bg-blue-300 p-3 rounded-lg text-white">Gestionar Categorias</a>
        <a href="/mostrarProductos" class="bg-green-300 p-3 rounded-lg text-white">Gestionar Productos</a>
        <a href="/mostrarPedidos" class="bg-yellow-300 p-3 rounded-lg text-white">Gestionar Pedidos</a>
        <a href="/mostrarGraficos" class="bg-red-300 p-3 rounded-lg text-white">Mostrar Gráficos</a>
    </div>
</div>

@endsection