@extends('layouts.menu')
@section('title', 'Sugerir Producto')
@section('content')
<div class="container py-3" style="max-width: 600px;">
    <h2 class="mb-4 text-center">Sugerir un Nuevo Producto</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('store.producto') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>
        <div class="mb-3">
            <label for="codigo_barra" class="form-label">Código de Barras</label>
            <input type="text" class="form-control" id="codigo_barra" name="codigo_barra" required>
        </div>
         <button type="submit" class="btn btn-primary w-100">Enviar Sugerencia</button>
    </form>
@endsection
