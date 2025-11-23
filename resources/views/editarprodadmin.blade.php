<!DOCTYPE html>
<html lang="en" xml:lang="en">

<head>
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('adminmenu')

    <div class="container mt-4">
        <h2>Editar Producto</h2>

        <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
            </div>

            <div class="mb-3">
                <label for="codigo_barra" class="form-label">Código de Barra</label>
                <input type="text" name="codigo_barra" class="form-control" value="{{ $producto->codigo_barra }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" class="form-control" value="{{ $producto->marca }}">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <input type="text" name="categoria" class="form-control" value="{{ $producto->categoria }}">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3">{{ $producto->descripcion }}</textarea>
            </div>

            <label for="img" class="form-label">URL de Imagen</label>
            <input class="form-control" type="file" id="img" name="img">
            @if ($producto->img)
                <div class="mt-2">
                    <img src="{{ asset($producto->img) }}" alt="{{ $producto->nombre }}" height="100">
                </div>
            @endif

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>