@extends('layouts.menu')

@section('title', 'Comparación')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-center">Comparación de Productos</h2>

    @if(count($compare))
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Atributo</th>
                        @foreach($compare as $producto)
                            <th>
                                <img src="{{ asset($producto->img ?? 'images/default.webp') }}" 
                                     alt="{{ $producto->nombre }}" 
                                     width="80" height="80" class="mb-2 rounded">
                                <br>
                                {{ $producto->nombre }}
                                <form action="{{ route('comparar.remove', $producto->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Quitar</button>
                                </form>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Marca</strong></td>
                        @foreach($compare as $producto)
                            <td>{{ $producto->marca }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td><strong>Ingredientes</strong></td>
                        @foreach($compare as $producto)
                            <td>{{ $producto->descripcion ?? 'N/A' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td><strong>Código de barras</strong></td>
                        @foreach($compare as $producto)
                            <td>{{ $producto->codigo_barra }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info text-center">
            No has agregado productos para comparar.
        </div>
    @endif
</div>
@endsection
