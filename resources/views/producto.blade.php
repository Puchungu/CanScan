@extends('layouts.menu')

@section('title', 'Códigos de Barras Escaneados')
@section('scanActive', 'active')

@section('content')
<div class="container py-4">
    @foreach ($producto as $item)
        <div class="row g-0 mb-4">
            <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
                <img src="{{ asset($item->img) }}" alt="{{ $item->nombre }}" class="img-fluid rounded">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title mb-3">{{ $item->nombre }}</h2>
                    <h5 class="text-secondary mb-3">Componentes:</h5>

                    <div class="row row-cols-1 row-cols-md-2 g-3">
                        @foreach ($item->componentes as $componente)
                            <div class="col">
                                <div class="border rounded p-3 bg-white h-100 shadow-sm">
                                    <h6 class="mb-1">{{ $componente->nombre }}</h6>
                                    <p class="mb-0 text-muted small">{{ $componente->descripcion }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('barcode') }}" class="btn btn-primary w-100 mt-3">
                        Escanear otro producto
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

