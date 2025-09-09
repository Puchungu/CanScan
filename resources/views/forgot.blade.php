@extends('layouts.menu')

@section('title', 'Recuperar Contraseña')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <h3 class="text-center mb-3">Recuperar Contraseña</h3>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input id="email" type="email" name="email" class="form-control" placeholder="Ingresa tu correo" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary w-100">Enviar enlace de recuperación</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none">Volver al inicio de sesión</a>
        </div>
    </div>
</div>
@endsection
