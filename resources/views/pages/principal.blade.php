@extends('app')

@section('title', 'Productos')

@section('content')

@if($productos->count() > 0)
        <div class="flex gap-4 overflow-x-auto max-h-[600px] p-3">
            @foreach($productos as $producto)
                <a href="/producto/{{$producto->id}}">
                <div class="card">
                    <img class="w-[320px] rounded-lg" src="{{$producto->image}}" alt="{{$producto->name}}" class="rounded-lg mb-3">
                    <h2 class="text-2xl">{{ $producto->name }}</h2>
                    <p>Precio: {{ $producto->price }}</p>
                    <p>Categoría: {{ $producto->categoria->name }}</p>
                </div>
                </a>
            @endforeach
        </div>
    @else
        <p>No hay productos destacados disponibles.</p>
@endif



@endsection