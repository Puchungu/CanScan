@extends('layouts.menu')
@section('title', 'Centro de Soporte')
@section('content')
    <div class="text-center mb-4">
            <h2>Centro de Soporte</h2>
            <p class="text-muted">¿En qué podemos ayudarte?</p>
    </div>

    <div class="list-group">
        <a href="{{ route('faqs') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3">
            <i class="bi bi-patch-question-fill fs-2 me-4 text-primary"></i>
            <div>
                <h5 class="mb-1">Preguntas Frecuentes (FAQs)</h5>
                <p class="mb-1 text-muted small">Encuentra respuestas a las dudas más comunes de forma inmediata.</p>
            </div>
            <i class="bi bi-chevron-right ms-auto"></i>
        </a>

        <a href="{{ route('contact') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3 mt-2">
            <i class="bi bi-envelope-paper-fill fs-2 me-4 text-danger"></i>
            <div>
                <h5 class="mb-1">Contactar / Reportar un Error</h5>
                <p class="mb-1 text-muted small">¿No encontraste la solución? Escríbenos y te ayudaremos.</p>
            </div>
            <i class="bi bi-chevron-right ms-auto"></i>
        </a>
    </div>
@endsection
