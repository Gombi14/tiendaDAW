@extends('app')

@section('title', 'Productos')

@section('content')

<div>
    @if ($cartDetails)
    <div class="flex gap-4 flex-wrap flex-row">
    @foreach ($cartDetails as $cartItem)
        <a href="/producto/{{ $cartItem['id'] }}">
            <div class="flex w-[300px] text-white bg-[#444444] gap-3 p-3 border-[1px] border-[#73FF50]">
                <img class="w-1/3 rounded-lg" src="{{ $cartItem['image'] }}" alt="{{ $cartItem['name'] }}">
                <div class="flex flex-col">
                    <h2 class="text-2xl">{{ $cartItem['name'] }}</h2>
                    <p>Precio: {{ $cartItem['price'] }}</p>
                    <p>Cantidad: {{ $cartItem['quantity'] }}</p>
                </div>
            </div>
        </a>
    @endforeach
    </div>
    @endif
</div>

@endsection