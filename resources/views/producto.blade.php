@extends('layouts.menu')

@section('title', 'Códigos de Barras Escaneados')
@section('scanActive', 'active')

@section('content')
<div class="container py-5">

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4 align-items-center">
        {{-- Imagen del producto --}}
        <div class="col-md-4 text-center">
            <div class="card shadow-sm border-0">
                @if($producto->img)
                    <img src="{{ asset($producto->img) }}" alt="{{ $producto->nombre }}" class="img-fluid rounded-top">
                @else
                    <img src="{{ asset('img/default.png') }}" alt="Sin imagen" class="img-fluid rounded-top">
                @endif
            </div>
        </div>

        {{-- Información del producto --}}
        <div class="col-md-8">
            <div class="card shadow-sm border-0 p-4 h-100">
                <h2 class="fw-bold mb-3">{{ $producto->nombre }}</h2>
                <h5 class="text-muted mb-4">Marca: {{ $producto->marca }}</h5>
                @if($producto->descripcion)
                    <p class="text-secondary mb-4">{{ $producto->descripcion }}</p>
                @endif

                <h5 class="mb-3">Componentes:</h5>
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    @foreach ($producto->componentes as $componente)
                        <div class="col">
                            <div class="card border-0 shadow-sm h-100 hover-shadow">
                                <div class="card-body">
                                    <h6 class="fw-semibold mb-2">{{ $componente->nombre }}</h6>
                                    @if($componente->descripcion)
                                        <p class="text-muted small mb-0">{{ $componente->descripcion }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href="{{ route('barcode') }}" class="btn btn-primary w-100 mt-4 py-2 fw-semibold">
                    Escanear otro producto
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Estilo extra para hover --}}
<style>
    .hover-shadow:hover {
        box-shadow: 0 8px 20px rgba(0,0,0,0.15) !important;
        transition: all 0.3s ease-in-out;
    }
</style>
@endsection
