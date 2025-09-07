<!DOCTYPE html>
<html>
<head>
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('adminmenu')

    <div class="container mt-4">
        <h2>Agregar Producto</h2>

        <form action="{{ route('admin.productos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="codigo_barra" class="form-label">Código de Barra</label>
                <input type="text" name="codigo_barra" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" class="form-control" placeholder="Desconocida">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">URL de Imagen</label>
                <input type="text" name="img" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
