<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Reporte de Usuario - CanScan</title>
    <style>
        body { font-family: sans-serif; }
        .container { padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Nuevo Mensaje desde el Centro de Soporte de CanScan</h2>
        <hr>
        <p><span class="label">De:</span> {{ $usuario->nombre }} ({{ $usuario->email }})</p>
        <p><span class="label">Motivo:</span> {{ ucfirst($datosFormulario['motivo']) }}</p>
        <p><span class="label">Asunto:</span> {{ $datosFormulario['asunto'] }}</p>
        <hr>
        <h3>Descripción del Problema:</h3>
        <p>
            {{ $datosFormulario['descripcion'] }}
        </p>
    </div>
</body>
</html>