<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CanScan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.css','resources/css/app.scss','resources/js/app.js'])
    @routes
    <script>
        window.showTutorial = {{ session('show_tutorial', 'false') ? 'true' : 'false' }};
    </script>
</head>
<body>
    
    <div class="container mt-5 mb-5">
        @yield('content')
    </div>

<nav class="bottom-nav">

    <a id="nav-inicio" href="{{ route('mostrar.Inicio') }}" class="nav-link {{ Request::routeIs('mostrar.Inicio') ? 'active' : '' }}">
        <span class="nav-icon bi bi-house-door"></span>
        <span class="nav-text">Inicio</span> </a>
    
    <a href="{{ route('barcode') }}" class="nav-link {{ Request::routeIs('barcode') ? 'active' : '' }}">
        <span class="nav-icon bi bi-upc-scan"></span>
        <span class="nav-text">Escanear</span> </a>
    
    <a href="{{ route('sugerir.producto') }}" id="nav-sugerir" class="nav-link {{ Request::routeIs('sugerir.producto') ? 'active' : '' }}">
        <span class="nav-icon bi bi-plus-circle"></span>
        <span class="nav-text">Producto</span> </a>
    
    <a href="{{ route('comparar.show') }}" id="nav-comparar" class="nav-link {{ Request::routeIs('comparar.show') ? 'active' : '' }}">
        <span class="nav-icon bi bi-bar-chart"></span>
        <span class="nav-text">Comparar</span> @if(session('compare') && count(session('compare')) > 0)
            <span class="badge bg-danger rounded-pill position-absolute">
                {{ count(session('compare')) }}
            </span>
        @endif
    </a>
    
    <a href="{{ route('profile') }}" id="nav-perfil" class="nav-link {{ Request::routeIs('profile') ? 'active' : '' }}">
        <span class="nav-icon bi bi-person"></span>
        <span class="nav-text">Perfil</span> </a>
    
</nav>
    </body>
</html>