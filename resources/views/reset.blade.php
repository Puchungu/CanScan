@extends('layouts.menu') {{-- O tu layout principal --}}

@section('title', 'Restablecer Contraseña')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <h3 class="text-center mb-3">Restablecer Contraseña</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email', $email) }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Nueva Contraseña</label>
                <input id="password" type="password" name="password" class="form-control" placeholder="Ingresa tu nueva contraseña" required>
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="Confirma tu contraseña" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success w-100">Restablecer Contraseña</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none">Volver al inicio de sesión</a>
        </div>
    </div>
</div>
@endsection
