<!DOCTYPE html>
<html>
<head>
    <title>Usuarios Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('adminmenu')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h2>Lista de Usuarios</h2>

    <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary mb-3">Agregar Usuario</a>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->username }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No hay usuarios</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
