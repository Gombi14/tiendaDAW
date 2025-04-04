@extends('app')

@section('title', 'Productos')

@section('content')

<div class="text-white flex justify-center items-center">

    <div class="flex-row w-[60%] min-h-[80vh] flex-wrap gap-4 justify-between">
        <div class="pb-3 text-xl">
            <a href="/tienda" class="w-full h-fit "><i class="fa-solid fa-angle-left pr-2"></i>Volver a la tienda</a>
        </div>
        <h1 class="text-xl w-full h-fit">Datos de envio</h1>
        <div class="flex gap-6 w-full flex-row-reverse">
            <div class="flex flex-col w-1/3 text-white bg-[#444444] gap-3 p-3 h-[170px] items-center justify-center">
                <h1 class="text-xl w-full">Productos: {{$data['items']}}</h1>
                <h1 class="text-xl w-full">Total: {{$data['total']}}€</h1>
            </div>
            <div class="w-2/3">
                <form action="/iniciarPedido" method="POST">
                    @csrf
                    <div class="mb-4 mt-4">
                        <h2 class="text-xl">Información de contacto</h2>
                        <div class="flex">
                            <div class="w-1/2 pr-2">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="input" required>
                            </div>
                            <div class="w-1/2 pl-2">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" name="apellidos" id="apellidos" class="input" required>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="w-1/2 pr-2">
                                <label for="telefono">Telefono</label>
                                <input type="text" name="telefono" id="telefono" class="input" required>
                            </div>
                            <div class="w-1/2 pl-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="input" value="{{$email}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 mt-4">
                        <h2 class="text-xl">Dirección de envio</h2>
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" id="direccion" class="input" required>
                    </div>
                    {{--<button class="button">Proceder al pago</button>--}}
                    <a href="{{ route('paypal.pay') }}" class="button">Pagar con PayPal</a>

                </form>
            </div>
        </div>
    </div>

</div>

@endsection