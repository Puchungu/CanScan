@extends('layouts.menu')

    @section('title', 'Inicio')

    @section('ProfileActive', 'active')

    @section('content')
    <div class="text-center mb-4">
        <h1>Información Personal</h1>
        <p class="text-muted small">Aquí puedes ver y editar tu información personal.</p>
    </div>
    <div class="container py-4" style="max-width: 600px;">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('update.profile') }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ Auth::user()->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary w-100 btn-login" id="save-btn" >
                    Guardar Cambios
                </button>
            </div>
        </form>
    @endsection