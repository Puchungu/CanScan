<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <h1>Escanear Código de Barras</h1>
    <div id="camara">
        <div>
            <form action="{{ route('barcode.scan') }}" method="POST">
                @csrf
                <input id="barcode-input" name="barcode" type="text" placeholder="Escriba el número del código de barras" >
                <button type="submit" style="width: 150px;">Subir código</button>
            </form>
    </div>
</body>
</html>