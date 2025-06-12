<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Códigos de Barras Escaneados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container py-4">
        @foreach ($producto as $producto)
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
                        <img src="{{ asset($producto->img) }}" alt="{{$producto->nombre}}" class="img-fluid rounded">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title mb-3">{{ $producto->nombre }}</h2>
                            <h5 class="text-secondary mb-3">Componentes:</h5>
                            <div class="row row-cols-1 row-cols-md-2 g-3">
                                @foreach ($producto->componentes as $componente)
                                    <div class="col">
                                        <div class="border rounded p-3 bg-white h-100 shadow-sm">
                                            <h6 class="mb-1">{{ $componente->nombre }}</h6>
                                            <p class="mb-0 text-muted small">{{ $componente->descripcion }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a href="{{ route('barcode') }}">
                            <button type="submit" class="btn btn-primary w-100 btn-login mt-3">
                                Escanear otro producto
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</body>
</html>
