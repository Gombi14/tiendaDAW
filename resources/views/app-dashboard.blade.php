<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
</head>
<body>
    @include('components.header')

    <main>
        @include('components.dashboard-side')
        <div class="flex-1 p-6 md:ml-64 text-white min-h-full" style="background-color:#565656">
            <div class="mt-20"></div>
            <div class="min-h-screen bg-dashboard">
                @yield('content')
            </div>
        </div>
    </main>
</body>
</html>
