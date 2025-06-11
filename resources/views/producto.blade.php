<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Códigos de Barras Escaneados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Códigos de Barras Escaneados</h1>
    @foreach ($producto as $producto)
        <div>
            <h2>{{ $producto->nombre }}</h2>
            <p>Código de barras: {{ $producto->codigo_barra }}</p>
            <h3>Componentes:</h3>
            <ul>
                @foreach ($producto->componentes as $componente)
                    <li>{{ $componente->nombre }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</body>
</html>