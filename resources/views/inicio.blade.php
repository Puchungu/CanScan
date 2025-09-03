@extends('layouts.menu')

@section('title', 'Inicio')

@section('homeActive', 'active')

@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Bienvenido a CanScan</h1>
        <p class="text-muted">Explora algunos de los productos registrados en nuestra base de datos</p>
    </div>

    @if($productos->count())
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($productos as $producto)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-3">
                        <div class="d-flex justify-content-center align-items-center p-3" style="height: 180px; background-color: #f8f9fa;">
                            <img src="{{ $producto->img ? asset($producto->img) : asset('images/default.webp') }}"
                                 class="img-fluid rounded"
                                 alt="{{ $producto->nombre }}"
                                 style="max-height: 160px;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $producto->nombre }}</h5>
                            <p class="text-muted mb-2">Marca: {{ $producto->marca }}</p>
                            <a href="{{ route('producto.show', $producto->id) }}" 
                               class="btn btn-outline-primary btn-sm rounded-pill">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center">
            No hay productos registrados aún.
        </div>
    @endif
</div>
@endsection
