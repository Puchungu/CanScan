<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <h1>Escanear Código de Barras</h1>
    <div id="camara"></div>
    <div>
        <button id="toggle-camera">Encender cámara</button>
        <img id="img-on" src="/images/camera-on.png" alt="Cámara encendida" style="display:none; width:40px;">
        <img id="img-off" src="/images/camera-off.png" alt="Cámara apagada" style="display:inline; width:40px;">
    </div>
     <div style="margin-top: 15px;">
        <form action="{{ route('barcode.upload') }}" method="POST" style="display: flex; flex-direction: column; gap: 10px;">
            @csrf
            <input 
                id="barcode-input"
                name="barcode"
                type="text" 
                placeholder="Escriba el número del código de barras" 
                   style="color: #222; background: #fff; border: 1px solid #ccc; padding: 8px; width: 300px;"
            >
            <button type="submit" style="width: 150px;">Subir código</button>
        </form>
    </div>
    
    
</body>
</html>