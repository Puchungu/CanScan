<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CanScan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="container mt-5 mb-5">
    @yield('content')
    </div>
    <!-- Menú inferior tipo Airbnb -->
    <nav class="bottom-nav d-flex justify-content-around border-top">
        <a href="{{ route('mostrar.Inicio') }}" class="nav-link active">
            <span class="nav-icon bi bi-house-door"></span>
            <span>Inicio</span>
        </a>
        <a href="{{ route('barcode') }}" class="nav-link">
            <span class="nav-icon bi bi-upc-scan"></span>
            <span>Escanear</span>
        </a>
        <a href="{{ route('profile') }}" class="nav-link">
            <span class="nav-icon bi bi-person"></span>
            <span>Perfil</span>
        </a>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>