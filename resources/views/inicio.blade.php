<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    @auth
    <h1 class="titulo-principal">Bienvenido, {{ Auth::user()->username }}</h1>
    <h1 class="titulo-principal">Bienvenido a CanScan</h1>
    <p class="parrafo">CanScan es una plataforma para que tu vida sea mas saludable y puedas saber que contienen los productos que consumes.</p>
    <p class="parrafo">Lamentablemente aun estamos en desarrollo, proximamente podras empezar a vivir una vida mas saludable</p>
    <p class="parrafo"> Si quieres escanear un producto, puedes hacerlo <a href="{{ route('barcode') }}">aquí</a>.</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
    @endauth

    @guest
    <h1 class="titulo-principal">Bienvenido a CanScan</h1>
    <p class="parrafo">CanScan es una plataforma para que tu vida sea mas saludable y puedas saber que contienen los productos que consumes.</p>
    <p class="parrafo">Lamentablemente aun estamos en desarrollo, proximamente podras empezar a vivir una vida mas saludable</p>
    <p class="parrafo">Por favor, <a href="{{ route('login') }}">inicia sesión</a> o <a href="{{ route('mostrar.Registro') }}">regístrate</a> para continuar.</p>
    <p class="parrafo"> Si quieres escanear un producto, puedes hacerlo <a href="{{ route('barcode') }}">aquí</a>.</p>
    @endguest
</body>
</html>