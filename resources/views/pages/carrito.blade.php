@extends('app')

@section('title', 'Productos')

@section('content')

<div class="min-h-[85vh]">
    @if ($cartDetails)
    <div class="flex gap-4 flex-wrap flex-row">

    <div class="absolute bottom-10 right-10 flex w-[400px] flex-col text-white bg-[#444444] gap-3 p-3 h-[170px] items-center justify-center">
        <h1 class="text-xl w-full">Productos: {{$totalItems}}</h1>
        <h1 class="text-xl w-full">Total: {{$totalPrice}}€</h1>
        <div>
            <a href="/checkout" class="bg-[#73ff50] text-black rounded-lg p-3">Comprar</a>
        </div>
    </div>

    @foreach ($cartDetails as $cartItem)
        <div class="flex w-[400px] text-white max-h-[170px] bg-[#444444] gap-3 p-3 border-[1px] border-[#73FF50]">
            <div class="w-2/5">
                <img class="w-full h-auto rounded-lg object-contain" src="{{ $cartItem['image'] }}" alt="{{ $cartItem['name'] }}">
            </div>            
            <div class="flex flex-col w-3/5">
                <h2 class="text-2xl">{{ $cartItem['name'] }}</h2>
                <div class="w-full flex">
                    <p class="w-1/2">Undidad: {{ $cartItem['price'] }}€</p>
                    <p class="w-1/2">Subtotal: {{ $cartItem['price']*$cartItem['quantity'] }}€</p>
                </div>
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
                <a href="{{ url('/delete-cart-item/' . $cartItem['id']) }}" class="bg-red-500 text-white px-3 py-1 w-full rounded text-center h-full flex items-center justify-center">
                    Eliminar
                </a>
            </div>
        </div>
    @endforeach
    </div>
    @else
    <div class="text-white h-[85vh] flex justify-center items-center">
        <div class="flex flex-col w-[400px] text-white bg-[#444444] gap-3 p-3 border-[1px] border-[#73FF50] h-[200px] items-center justify-center">
            <h1 class="text-xl">El carrito esta vacío</h1>
            <a href="/tienda" class="bg-[#73ff50]  text-black rounded-lg p-3">Comprar productos</a>
        </div>
    </div>
    @endif
</div>

<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/67e3b98942fabf190f06eb71/1in8opgsc';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

@vite(['resources/js/carrito.js'])

@endsection