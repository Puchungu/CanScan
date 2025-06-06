<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificacion correo electronico</title>
</head>
<body>
    <div class="alert alert-info">
        Verifica tu dirección de correo. Te hemos enviado un enlace de verificación.
    </div>
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Reenviar enlace de verificación</button>
    </form>
</body>
</html>