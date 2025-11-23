@extends('layouts.menu')

@section('title', 'Inicio')
@section('homeActive', 'active')

@section('content')

    <style>
        /* Ocultar la barra de scroll fea pero permitir el deslizamiento */
        .category-scroll::-webkit-scrollbar {
            display: none;
        }

        .category-scroll {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
    <div class="container py-4">

        <div class="text-center">
            <h1 class="page-title">Bienvenido a CanScan</h1>
            <p class="page-subtitle">Explora algunos de los productos registrados en nuestra base de datos</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container mb-4">
            <div class="category-scroll d-flex gap-2 overflow-auto py-2 flex-nowrap">

                {{-- Botón "Todas" --}}
                <a href="{{ route('mostrar.Inicio') }}"
                    class="btn btn-{{ !request('categoria') ? 'dark' : 'outline-dark' }} rounded-pill text-nowrap">
                    Todas
                </a>

                {{-- Botones de Categorías --}}
                @foreach($categorias as $cat)
                    <a href="{{ route('mostrar.Inicio', ['categoria' => $cat]) }}"
                        class="btn btn-{{ request('categoria') == $cat ? 'dark' : 'outline-dark' }} rounded-pill text-nowrap">
                        {{ $cat }}
                    </a>
                @endforeach

            </div>

            @if($productos->count())
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

                    @foreach ($productos as $producto)
                        <div class="col">
                            <div class="product-card">

                                <div class="card-img-container">
                                    <img src="{{ $producto->img ? asset($producto->img) : asset('images/default.webp') }}"
                                        alt="{{ $producto->nombre }}">
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                                    <p class="card-text">Marca: {{ $producto->marca ?? 'Desconocida' }}</p>

                                    <div class="btn-group w-100">
                                        <a href="{{ route('producto.show', $producto->id) }}" class=" btn btn-primary w-50">
                                            Ver detalles
                                        </a>

                                        <form action="{{ route('comparar.add') }}" method="POST" class="w-50">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $producto->id }}">
                                            <button type="submit" class=" btn btn-primary w-100">
                                                <i class="bi bi-bar-chart"></i> Comparar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

            </div> @else
                <div class="alert alert-info text-center">
                    No hay productos registrados aún.
                </div>
            @endif
        </div>
@endsection