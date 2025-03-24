@extends('app')

@section('title', 'Productos')

@section('content')

<div>
    @if ($cartDetails)
    <div class="flex gap-4 flex-wrap flex-row">
    @foreach ($cartDetails as $cartItem)
        <div class="flex w-[400px] text-white bg-[#444444] gap-3 p-3 border-[1px] border-[#73FF50]">
            <div class="w-2/5">
                <img class="w-full h-auto rounded-lg object-contain" src="{{ $cartItem['image'] }}" alt="{{ $cartItem['name'] }}">
            </div>            
            <div class="flex flex-col w-3/5">
                <h2 class="text-2xl">{{ $cartItem['name'] }}</h2>
                <p>Precio: {{ $cartItem['price'] }}</p>
                <div class="mb-1">
                    <label for="cantidad">Cantidad: </label>
                    <input
                        name="cantidad"
                        type="number"
                        value="{{ $cartItem['quantity'] }}"
                        min="1"
                        data-id="{{ $cartItem['id'] }}"
                        class="update-cart bg-[#222222] text-white border border-gray-600 rounded py-2 px-3 w-16 focus:outline-none focus:shadow-outline"
                    />
                </div>
                <a href="{{ url('/delete-cart-item/' . $cartItem['id']) }}" class="bg-red-500 text-white px-3 py-1 w-full rounded text-center">
                    Eliminar
                </a>
            </div>
        </div>
    @endforeach
    </div>
    @endif
</div>

@vite(['resources/js/carrito.js'])

@endsection