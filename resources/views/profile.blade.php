@extends('layouts.menu')

    @section('title', 'Inicio')

    @section('homeActive', 'active') 

    @section('content')
    @auth
    <div class="container py-4" style="max-width: 800px;">
        <!-- Cabecera del perfil -->
        <div class="text-center mb-4">
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nombre) }}&background=random&color=fff" alt="Foto de perfil" class="rounded-circle shadow-sm mb-3" width="120" height="120">
        </div>
        <div class="text-center mb-4">
            <h2 class="fw-bold">{{ Auth::user()->nombre }}</h2>
            <p class="text-muted small">Miembro desde {{ Auth::user()->created_at->format('M Y') }}</p>
        <!-- Secciones estilo Airbnb -->
        <div class="list-group shadow-sm rounded-3">
            <a href="{{ route('personalinfo') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span><i class="bi bi-person me-2"></i>Información personal</span>
                <i class="bi bi-chevron-right"></i>
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span><i class="bi bi-shield-lock me-2"></i>Seguridad</span>
                <i class="bi bi-chevron-right"></i>
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span><i class="bi bi-credit-card me-2"></i>Pagos</span>
                <i class="bi bi-chevron-right"></i>
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span><i class="bi bi-chat-left-text me-2"></i>Reseñas</span>
                <i class="bi bi-chevron-right"></i>
            </a>
        </div>

        <!-- Cerrar sesión -->
        <div class="mt-4 text-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link text-danger">
                    <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
                </button>
            </form>
        </div>
    </div>
    @endauth
    @guest
        <div class="text-center">
            <h2>Debes iniciar sesión para ver tu perfil</h2>
            <p>
                <a href="{{ route('login') }}" class="btn btn-primary me-2">Iniciar Sesión</a>
                <a href="{{ route('mostrar.Registro') }}" class="btn btn-outline-primary">Registrarse</a>
            </p>
        </div>
    @endguest
    @endsection