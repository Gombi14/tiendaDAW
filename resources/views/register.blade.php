<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div>
        <main class="flex items-center justify-center p-6 min-h-screen" style="background-image:url('{{ asset('img/1.png') }}');background-size: cover; background-position: center;">
            <div class="bg-black flex text-white w-[60%] min-w-[1000px] h-[60vh] rounded-3xl shadow-green">
                <div class="w-2/3 rounded-l-3xl" style="background-image: url( {{ asset('img/login-foto.jpeg') }} );background-size: cover; background-position: center;">
                
                </div>
                
                <div class="w-1/3  bg-[#0D0522] rounded-r-3xl h-full flex flex-col justify-center p-6">
                    <h1 class="title">Registro</h1>
                    <form action="{{ route('newUser') }}" method="POST">
                        @csrf
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="p-2 rounded-lg border border-gray-300 mb-4 text-black w-full" required><br>
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="p-2 rounded-lg border border-gray-300 mb-4 text-black w-full" required><br>               
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="p-2 rounded-lg border border-gray-300 mb-4 text-black w-full" required><br>
                        <label for="contraseña">Contraseña</label>
                        <input type="password" name="password" id="password" class="p-2 rounded-lg border border-gray-300 mb-4 text-black w-full" required><br>
                        <button class="rounded-lg text-2xl mb-3 bg-[#444444] border-[1px] border-separate border-[#73FF50] p-4 text-white w-full">Registrarse</button>
                    </form>
                    @if ($errors->any())
                    <div class="text-red-500">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <a href="/login" class="hover:underline">Ya tienes una cuenta? Inicia Sesion</a>
                    <a href="/" class="hover:underline">Volver</a>
                </div>    
            </div>
        </main>
    </div>
</body>
</html>