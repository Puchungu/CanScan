<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escanear Código de Barras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
</head>
<body class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="container py-3" style="max-width: 600px;">
        <div class="d-flex justify-content-between mb-3">
            <div class="instruction-card flex-fill mx-1">
                <img src="https://cdn-icons-png.flaticon.com/128/2586/2586709.png" alt="Cámara" width="38" class="mb-1">
                <div class="small">Apunta tu cámara<br>al código</div>
            </div>
            <div class="instruction-card flex-fill mx-1">
                <img src="https://cdn-icons-png.flaticon.com/128/5393/5393325.png" alt="Código" width="38" class="mb-1">
                <div class="small">Si está dañado,<br>escribe el código</div>
            </div>
            <div class="instruction-card flex-fill mx-1">
                <img src="https://cdn-icons-png.flaticon.com/128/409/409657.png" alt="Luz" width="38" class="mb-1">
                <div class="small">Busca un área<br>bien iluminada</div>
            </div>
        </div>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div id="camara" class="camera mb-3"><svg class="camera-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 64 64">
    <rect x="8" y="20" width="48" height="32" rx="6" stroke="#888"/>
    <circle cx="32" cy="36" r="10" stroke="#888"/>
    <rect x="24" y="12" width="16" height="8" rx="2" stroke="#888"/>
</svg></div>
        <div class="switch mb-3">
            <button id="toggle-camera" class="btn btn-outline-success rounded-pill px-4">Encender cámara</button>
        </div>
        <form action="{{ route('barcode.scan') }}" method="POST">
            @csrf
            <input id="barcode-input" name="barcode" type="text" class="form-control barcode-input mb-3" placeholder="Escribe el código de barras" required>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary w-100 btn-login">Mostrar Producto</button>
            </div>
        </form>
        <div class="d-grid">
            <a href="{{ route('mostrar.Inicio') }}" class="btn btn-celeste mt-3">
                <button type="submit" class="btn btn-primary w-100 btn-login">Regresar al home</button>
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

