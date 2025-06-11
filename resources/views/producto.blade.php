<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Códigos de Barras Escaneados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body>
    @foreach ($producto as $producto)
        <img src="{{ asset($producto->img) }}" alt="{{$producto->nombre}}" class="img-fluid mb-3">
        <h2 class="card-title mb-3">{{ $producto->nombre }}</h2>
        <h5 class="mb-3 text-secondary">Componentes:</h5>
        @foreach ($producto->componentes as $componente)
            <div class="border rounded p-2 bg-light">
                <span class="d-block">{{ $componente->nombre }}</span>
                <span> {{$componente->descripcion}}</span>
            </div>
        @endforeach
    @endforeach
</body>
</html>