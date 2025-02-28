@extends('app')

@section('title', 'Productos')

@section('content')


<h1 class="text-3xl mb-6">Principal</h1>
@if($productos->count() > 0)
        <div class="flex gap-4 flex-wrap">
            @foreach($productos as $producto)
                <div class="flex flex-col bg-gray-900 gap-4 text-white p-4 rounded-lg" style="min-width: 300px;">
                    <h2 class="text-3xl">{{ $producto->name }}</h2>
                    <p>Precio: {{ $producto->price }}</p>
                    <p>Categoría: {{ $producto->categoria->name }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>No hay productos destacados disponibles.</p>
    @endif

@endsection