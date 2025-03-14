@extends('app')

@section('title', 'Productos')

@section('content')

<div class="flex flex-row min-w-screen  gap-4 justify-between">
    @if ($producto->image)
    <div class="text-white flex flex-col w-1/2 min-h-[80vh] rounded-lg ">
        <img class="max-h-[85vh] w-fit h-auto rounded-3xl" src="{{ asset($producto->image) }}" alt="No se ve una mierda">
    </div>
    @else
    <div class="text-white flex flex-col w-1/2 bg-gray-300 min-h-[80vh] rounded-lg justify-center text-center p-6">
        <p>Imgaen placeholder</p>
    </div>
    @endif
    <div class="text-white flex flex-col w-1/2 p-6">
        <h1 class="text-3xl mb-6">{{$producto->name}}</h1>
        <p class="mb-6">{{$producto->description}}</p>
        <p class="mb-6">Precio: {{$producto->price}}€</p>
        <p class="mb-6">Categoría: {{$producto->categoria->name}}</p>
        <form action="/addToCart" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$producto->id}}">
            <label for="cantidad">Cantidad:</label><br>
            <input type="number" name="cantidad" id="cantidad" class="p-2 rounded-lg border border-gray-300 mb-4 text-black" value="1"><br>
            <button class="rounded-lg text-2xl bg-[#444444] border-[1px] border-separate border-[#73FF50] p-4 text-[#73ff50] text-white w-full">Añadir al carrito </button>
        </form>
    </div>
</div>
@endsection