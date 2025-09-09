<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>
<body class="Auth-body">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-5 shadow">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <h1 class="h1 text-center titulo-principal">Iniciar sesion</h1>
            <form action="{{ route('iniciarSesion') }}" method="POST" class="form-auth">
                @csrf
                <label class="encabezado">Correo electronico</label>
                <input type="text" name="email" required class="form-control mb-2" placeholder="Correo electronico">
                <label class="encabezado">Contrasena</label>
                <input type="password" name="password" required class="form-control mb-2" placeholder="Contrasena">
                <div class="d-flex gap-5 mb-2">
                    <a href="{{ route('mostrar.Registro') }}" class="page-link">Crear cuenta</a>
                    <a href="{{ route('password.request') }}" class="page-link">¿Olvidaste tu contraseña?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100 btn-login">Iniciar sesion</button>
                <div class="text-center mt-3">
                    <a href="{{ route('barcode') }}" class="link-secondary small">Entrar como invitado</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>