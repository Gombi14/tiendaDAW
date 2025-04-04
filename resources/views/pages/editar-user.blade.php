@extends('app')

@section('title', 'Productos')

@section('content')

<form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf
    
    <div>
        <label class="text-white" for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
    </div>

    <div>
        <label class="text-white" for="surname">Apellido:</label>
        <input type="text" id="surname" name="surname" value="{{ old('surname', $user->surname) }}" required>
    </div>

    <div>
        <label class="text-white" for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
    </div>

    <div>
        <label class="text-white" for="passwordActual">Contraseña Actual:</label>
        <input type="password" id="passwordActual" name="passwordActual">
        <label class="text-white" for="passwordNueva">Nueva Contraseña:</label>
        <input type="password" id="passwordNueva" name="passwordNueva">
        <small class="text-white">Deja este campo vacío si no deseas cambiar la contraseña.</small>
    </div>

    <div>
        <button class="text-white" type="submit">Actualizar Usuario</button>
    </div>
</form>

@endsection