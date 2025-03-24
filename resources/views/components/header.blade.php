<header class="bg-black text-white text-lg fixed w-full min-h-[76px] pr-3 pl-3" style="z-index: 1001; background-color:#393939;">
    <div class="flex justify-between mt-[6px]">
        <a href="/">
            <div class="flex">
                <img src="{{ asset('img/logo.png') }}" alt="" style="max-height: 60px;">
                <h1 class="text-3xl flex items-center">Tienda</h1>
            </div>
        </a>
        <nav class="flex items-center">
            <ul class="flex gap-4">
                <li class="hover:underline"><a href="/tienda">Inicio</a></li>
                <li class="hover:underline"><a href="/carrito">Carrito</a></li>
                <li class="hover:underline"><a href="/dashboard">Dashboard</a></li>
                @if (!Auth::check())
                    <li class="hover:underline"><a href="/login">Inicia Sessión</a></li>
                @else
                    <li class="hover:underline"><a href="/logout">Cerrar Sessión</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>