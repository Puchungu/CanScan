<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
    <title>Sugerencias Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('adminmenu')
<div class="container">
    <h1>Sugerencias de Productos Pendientes</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Producto</th>
                <th>Marca</th>
                <th>Código de Barras</th>
                <th>Sugerido por (User ID)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sugerencias as $sugerencia)
                <tr>
                    <td>{{ $sugerencia->id }}</td>
                    <td>{{ $sugerencia->nombre }}</td>
                    <td>{{ $sugerencia->marca ?? 'N/A' }}</td>
                    <td>{{ $sugerencia->codigo_barra ?? 'N/A' }}</td>
                    <td>{{ $sugerencia->user_id }}</td>
                    <td>
                        <a href="{{ route('admin.sugerencias.aprobar', $sugerencia->id) }}" class="btn btn-success btn-sm">Aprobar</a>

                        <form action="{{ route('admin.sugerencias.rechazar', $sugerencia->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Rechazar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay sugerencias pendientes.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
