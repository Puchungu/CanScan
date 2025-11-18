<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - CanScan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <style>
        .login-image-side {
            background-image: url('/images/login.png');
            background-size: cover;
            background-position: center;
            min-height: 50vh;
        }
    </style>
</head>
<body class="login-body">

    <div class="container-fluid p-0 login-div">
        <div class="row g-0 min-vh-100">

            <div class="col-lg-7 d-none d-lg-block login-image-side">
                </div>

            <div class="col-lg-5 d-flex align-items-center justify-content-center">
                
                <div class="login-form-container">
                    
                    <div class="text-center mb-5">
                        <img src="{{ asset('images/logo.png') }}" alt="CanScan Logo" style="width: 300px;">
                    </div>

                    <h1 class="h2 fw-bold text-center mb-4">Bienvenido de vuelta</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Datos incorrectos. Por favor, inténtalo de nuevo.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('iniciarSesion') }}" method="POST" class="d-flex flex-column gap-3">
                        @csrf
                        
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
                            <input type="password" id="password" name="password" required class="form-control" placeholder="Contraseña">
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('password.request') }}" class="small">¿Olvidaste tu contraseña?</a>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Iniciar sesión</button>
                    
                        <div class="text-center mt-3">
                            <span class="text-muted">¿No tienes cuenta?</span>
                            <a href="{{ route('mostrar.Registro') }}">Regístrate aquí</a>
                        </div>
                        
                        <div class="text-center mt-2">
                             <a href="{{ route('barcode') }}" class="link-secondary small">Entrar como invitado</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
