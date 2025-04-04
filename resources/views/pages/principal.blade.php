@extends('app')

@section('title', 'Productos')

@section('content')

<style>
        /* Estilos para el popup */
        #gamePopup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            display: none; /* Se oculta por defecto */
            z-index: 1000;
            text-align: center;
        }

       

        /* Contenedor de elementos arrastrables */
        #draggables, #droppables {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        
        .droppable.highlight{
            border: 2px solid rgb(0, 255, 64);
        }

        .draggable {
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            line-height: 50px;
            cursor: grab;
            background: lightgray;
            border-radius: 50%;
        }

        .draggable:hover {
            background: grey;
        }

        .droppable {
            width: 60px;
            height: 60px;
            border: 2px dashed black;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        #winMessage {
            font-weight: bold;
            color: green;
            display: none;
        }

        button {
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            background: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background: #0056b3;
        }
        .block{
            display: block;
        }
</style>

<div id="gamePopup" class="hidden">
    <h3>Arrastra los elementos al lugar correcto</h3>
    <div id="draggables">
        <div class="draggable" draggable="true" id="item1">🔵</div>
        <div class="draggable" draggable="true" id="item2">🔴</div>
    </div>
    <div id="droppables">
        <div class="droppable" data-target="item2"></div>
        <div class="droppable" data-target="item1"></div>
    </div>
    <p id="winMessage" class="hidden">¡Felicidades! Aqui tienes tu codigo de descuento: JUGLAR</p>
    <button id="closeButton" class="hidden" closePopup()>Cerrar</button>
</div>

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
@endsection


