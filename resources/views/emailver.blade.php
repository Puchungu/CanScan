<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de correo electrónico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-light">
    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
            <div class="text-center mb-3">
                <img src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="Email Icon" width="64" class="mb-2">
                <h4 class="mb-0">Verifica tu correo electrónico</h4>
            </div>
            <div class="alert alert-info text-center">
                Te hemos enviado un enlace de verificación a tu correo.<br>
                Por favor, revisa tu bandeja de entrada.
            </div>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary w-100 reenviar-btn">
                    Reenviar enlace de verificación
                </button>
            </form>
            <div class="mt-3 text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link text-danger p-0">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
