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
        <div id="camara" class="camera mb-3"> </div>
        <div class="switch mb-3">
            <button id="toggle-camera" class="btn btn-outline-success rounded-pill px-4">Encender cámara</button>
        </div>
        <form action="{{ route('barcode.scan') }}" method="POST">
            @csrf
            <input id="barcode-input" name="barcode" type="text" class="form-control barcode-input mb-3" placeholder="Escribe el código de barras">
            <div class="d-grid">
                <button type="submit" class="btn btn-celeste">Mostrar Producto</button>
            </div>
        </form>
        <div class="d-grid">
            <a href="{{ route('mostrar.Inicio') }}" class="btn btn-celeste mt-3">
                Regresar al home
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

