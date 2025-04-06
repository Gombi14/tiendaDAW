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
                    <h1 class="title">Inicio de sesión</h1>
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="input" required><br>
                            <label for="contraseña">Contraseña</label>
                            <input type="password" name="password" id="password" class="input" required><br>
                        </div>
                        <button class="rounded-lg text-2xl mb-3 bg-[#444444] border-[1px] border-separate border-[#73FF50] p-4 text-[#73ff50] text-white w-full">Iniciar sessión</button>
                    </form>

                    @if(session('warning'))
                        <div class="text-red-300">
                            {{ session('warning') }}
                        </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <a href="/register" class="hover:underline">No tienes cuenta? Registrate</a>
                    <a href="/" class="hover:underline">Volver</a>
                </div>    
            </div>
        </main>
    </div>
</body>
</html>