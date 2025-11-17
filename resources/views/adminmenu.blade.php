<!-- resources/views/layouts/adminmenu.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CanScan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.scss'])
</head>
<body>
    <nav class="bottom-nav d-flex justify-content-around border-top fixed-bottom bg-light">
        <a href="{{ route('admin.productos.index') }}" class="nav-link {{ Request::routeIs('admin.productos.index') ? 'active' : '' }}">
            <span class="nav-icon bi bi-house-door"></span>
            <span>Ver Productos</span>
        </a>
        <a href="{{ route('admin.usuarios.index') }}" class="nav-link {{ Request::routeIs('admin.usuarios.index') ? 'active' : '' }}">
            <span class="nav-icon bi bi-people"></span>
            <span> Ver Usuarios</span>
        </a>
        <a href="{{ route('admin.sugerencias.index') }}" class="nav-link {{ Request::routeIs('admin.sugerencias.index') ? 'active' : '' }}">
            <span class="nav-icon bi bi-chat-dots"></span>
            <span> Ver Sugerencias</span>
        </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link" style="background: none; border: none; padding: 0; cursor: pointer;">
            <span class="nav-icon bi bi-box-arrow-right"></span>
            <span>Cerrar Sesión</span>
        </button>
    </form>
    </nav>
</body>
