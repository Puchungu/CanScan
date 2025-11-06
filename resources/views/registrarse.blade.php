<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Crear cuenta - CanScan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <style>
        .login-image-side {
            background-image: url('/images/login-bg.jpg');
            background-size: cover;
            background-position: center;
            min-height: 50vh;
        }
    </style>
    </head>
<body class="login-body">

    <div class="container-fluid p-0">
        <div class="row g-0 min-vh-100">

            <div class="col-lg-7 d-none d-lg-block login-image-side">
                </div>

            <div class="col-lg-5 d-flex align-items-center justify-content-center">
                
                <div class="login-form-container">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="CanScan Logo" style="width: 300px;">
                    </div>

                    <h1 class="h2 fw-bold text-center mb-4">Crea tu cuenta</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡Ups!</strong> Por favor corrige los errores:
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('Registrarse') }}" method="POST" class="d-flex flex-column gap-3">
                        @csrf
                        
                        <div class="input-group-icon">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="text" id="nombre" name="nombre" required class="form-control" placeholder="Nombre completo" value="{{ old('nombre') }}">
                        </div>

                        <div class="input-group-icon">
                            <span class="input-group-text">
                                <i class="bi bi-at"></i>
                            </span>
                            <input type="text" id="username" name="username" required class="form-control" placeholder="Nombre de usuario" value="{{ old('username') }}">
                        </div>
                        
                        <div class="input-group-icon">
                            <span class="input-group-text">
                                <i class="bi bi-envelope-fill"></i>
                            </span>
                            <input type="email" id="email" name="email" required class="form-control" placeholder="Correo electrónico" value="{{ old('email') }}">
                        </div>
                        
                        <div class="input-group-icon">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill"></i>
                            </span>
                            <input type="password" id="password" name="password" required class="form-control" placeholder="Contraseña (mín. 8 caracteres)">
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold mt-2">Crear cuenta</button>
                    
                        <div class="text-center mt-3">
                            <span class="text-muted">¿Ya tienes cuenta?</span>
                            <a href="{{ route('login') }}">Inicia sesión aquí</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
