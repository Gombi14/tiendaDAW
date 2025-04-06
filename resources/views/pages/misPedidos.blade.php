@extends('app')

@section('title', 'Mis Pedidos')

@section('content')

<div class="text-white flex justify-center">

    <div class="w-[60%]">
        <h1 class="title">Mis pedidos</h1>
        <main class="flex flex-col gap-6">
            @foreach ($pedidos as $pedido)
                <div class="w-full shadow-green flex rounded-lg py-4 px-6 text-xl justify-between items-center bg-boton">
                    <div class="min-w-2/10">{{$pedido->name.' '.$pedido->surname}}</div>
                    <div class="w-2/10">{{$pedido->direction}}</div>
                    <div class="w-2/10">
                        @if ($pedido->delivery_date != null)
                        {{ \Carbon\Carbon::parse($pedido->delivery_date)->format('d/m/Y') }}

                        @else
                        Por entregar
                        @endif
                    </div>
                    <div class="w-2/10">{{$pedido->total_price}}€</div>
                    <a href="{{route('pedido.generarPDF', $pedido->id)}}">
                        <div class="button w-2/10 w-auto text-center mt-0">Ver factura</div>
                    </a>
                </div>
            @endforeach 
        </main>
    </div>
</div>

@endsection