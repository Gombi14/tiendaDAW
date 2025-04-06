@extends('app')

@section('title', 'Productos')

@section('content')

<div class="flex justify-center text-white">
    <div class="flex flex-col bg-boton p-8 rounded-xl w-[40%]">
        <h1 class="title">Modificar datos de usuario</h1>
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            
            <div>
                <label class="text-white" for="name">Nombre:</label>
                <input type="text" id="name" class="input" name="name" value="{{ old('name', $user->name) }}" required>
            </div>
        
            <div>
                <label class="text-white" for="surname">Apellido:</label>
                <input type="text" id="surname" class="input" name="surname" value="{{ old('surname', $user->surname) }}" required>
            </div>
        
            <div>
                <label class="text-white" for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" class="input" value="{{ old('email', $user->email) }}" required>
            </div>
        
            <div>
                <label class="text-white" for="passwordActual">Contraseña Actual:</label>
                <input type="password" id="passwordActual" class="input" name="passwordActual">
                <label class="text-white" for="passwordNueva">Nueva Contraseña:</label>
                <input type="password" id="passwordNueva" class="input" name="passwordNueva">
                <small class="text-white">Deja este campo vacío si no deseas cambiar la contraseña.</small>
            </div>
        
            <div class="w-full flex justify-between">
                <div>
                    <button class="text-white" type="submit">Actualizar Usuario</button>
                </div>
                <div>
                    <a href="/misPedidos" class="button">Ver mis pedidos</a>
                </div>  
            </div>
        </form>
    </div>
</div>


@endsection