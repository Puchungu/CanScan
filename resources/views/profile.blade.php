@extends('layouts.menu')

@section('title', 'Perfil')
@section('profileActive', 'active')

@section('content')
@auth
<div class="container py-4" style="max-width: 800px;">
    <!-- Cabecera del perfil -->
    <div class="text-center mb-4 position-relative">
        <img id="current-avatar"
             src="{{ Auth::user()->avatar ? asset('avatars/' . Auth::user()->avatar . '.png') : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->nombre) . '&background=random&color=fff' }}"
             alt="Foto de perfil"
             class="rounded-circle shadow-sm mb-3"
             width="120"
             height="120"
             style="cursor: pointer;">
        <p class="text-muted small">Haz click en tu avatar para cambiarlo</p>
    </div>

    <h2 class="fw-bold text-center">{{ Auth::user()->nombre }}</h2>
    <p class="text-muted text-center small">Miembro desde {{ Auth::user()->created_at->format('M Y') }}</p>

    <!-- Modal de selección de avatar -->
    <div id="avatar-selector" class="d-none position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center" style="z-index: 1050;">
        <div class="bg-white p-4 rounded shadow text-center">
            <h5 class="mb-3">Selecciona tu avatar</h5>
            <div class="d-flex justify-content-center gap-3">
                @foreach(['1','2','3','4'] as $a)
                    <form method="POST" action="{{ route('profile.avatar') }}">
                        @csrf
                        <input type="hidden" name="avatar" value="{{ $a }}">
                        <button type="submit" class="btn p-0 border-0">
                            <img src="{{ asset('avatars/' . $a . '.png') }}"
                                 class="rounded-circle {{ Auth::user()->avatar === $a ? 'border border-primary border-3' : '' }}"
                                 width="80" height="80"
                                 style="cursor:pointer" alt="Avatar {{ $a }}">
                        </button>
                    </form>
                @endforeach
            </div>
            <button id="close-avatar-selector" class="btn btn-link mt-3 text-secondary">Cancelar</button>
        </div>
    </div>

    <!-- Secciones estilo Airbnb -->
    <div class="list-group shadow-sm rounded-3 mt-4">
        <a href="{{ route('personalinfo') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            <span><i class="bi bi-person me-2"></i>Información personal</span>
            <i class="bi bi-chevron-right"></i>
        </a>
        <a href="{{ route('security') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            <span><i class="bi bi-shield-lock me-2"></i>Seguridad</span>
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

<script>
const currentAvatar = document.getElementById('current-avatar');
const avatarSelector = document.getElementById('avatar-selector');
const closeSelector = document.getElementById('close-avatar-selector');

// Abrir selector
currentAvatar.addEventListener('click', () => {
    avatarSelector.classList.remove('d-none');
});

// Cerrar selector
closeSelector.addEventListener('click', () => {
    avatarSelector.classList.add('d-none');
});
avatarSelector.addEventListener('click', (e) => {
    if(e.target === avatarSelector){
        avatarSelector.classList.add('d-none');
    }
});
</script>
@endsection

