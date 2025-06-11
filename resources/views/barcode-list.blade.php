{{-- filepath: resources/views/barcode-list.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Códigos de Barras Escaneados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Códigos de Barras Escaneados</h1>
    @foreach ($productos as $producto)
            <li>{{ $producto->nombre }}</li>
        @endforeach
    <a href="{{ route('barcode') }}">Escanear otro código</a>
</body>
 
</html>
{{-- filepath: resources/views/barcode.blade.php --}}