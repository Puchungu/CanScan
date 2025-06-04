<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    @auth
    <h1>Bienvenido, {{ Auth::user()->username }}</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
    @endauth

    @guest
    <h1>Bienvenido a CanScan</h1>
    <p>CanScan es una plataforma para que tu vida sea mas saludable y puedas saber que contienen los productos que consumes.</p>
    <p>Lamentablemente aun estamos en desarrollo, proximamente podras empezar a ser mas saludable</p>
    <p>Por favor, <a href="{{ route('mostrar.Login') }}">inicia sesión</a> o <a href="{{ route('mostrar.Registro') }}">regístrate</a> para continuar.</p>
    @endguest
</body>
</html>