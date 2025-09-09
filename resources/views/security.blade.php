@extends('layouts.menu')

    @section('title', 'Inicio')

    @section('ProfileActive', 'active')

    @section('content')
    <div class="text-center mb-4">
        <h1>Seguridad</h1>
        <p class="text-muted small">Aquí puedes cambiar tu contraseña</p>
    </div>
    <div class="container py-4" style="max-width: 600px;">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{ route('update.password') }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="current_password" class="form-label">Contraseña Actual</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">Nueva Contraseña</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary w-100 btn-login" id="save-btn" >
                    Cambiar Contraseña
                </button>
            </div>
        </form>
    @endsection