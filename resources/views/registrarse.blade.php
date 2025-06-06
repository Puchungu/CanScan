<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-5 shadow">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h1 class="h1 text-center titulo-principal">Registrarse</h1>
            <form action="{{ route('Registrarse') }}" method="POST" enctype="multipart/form-data" class="form-auth">
                @csrf
                <label class="encabezado">Nombre</label>
                <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre">
                <label class="encabezado">Nombre de usuario</label>
                <input type="text" name="username" class="form-control mb-2" placeholder="Username">
                <label class="encabezado">Correo electronico</label>
                <input type="text" name="email" class="form-control mb-2" placeholder="Correo electronico">
                <label class="encabezado">Foto de perfil</label>
                <input type="file" name="img" class="form-control mb-2">
                <label class="encabezado">Contrasena</label>
                <input type="password" name="password" class="form-control mb-2" placeholder="Contrasena">
                <a href="{{ route('login') }}" class="page-link mb-2">Ya tienes cuenta?, Inicia sesión</a>
                <button type="submit" class="btn btn-primary w-100 btn-register">Registrarse</button>
            </form>
        </div>
    </div>
</body>
</html>