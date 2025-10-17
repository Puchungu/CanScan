@extends('layouts.menu')
@section('title', 'Centro de Soporte')
@section('content')
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <h2>Contacta con Nosotros</h2>
                <p class="text-muted">¿Tienes alguna duda o encontraste un error? Estamos aquí para ayudarte.</p>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('report.error.submit') }}" method="POST">
                        @csrf 

                        <div class="mb-3">
                            <label for="motivo" class="form-label">Motivo del Contacto</label>
                            <select class="form-select" id="motivo" name="motivo" required>
                                <option value="error">Reportar un Error Técnico</option>
                                <option value="sugerencia">Sugerir una Mejora</option>
                                <option value="consulta">Consulta General</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="asunto" class="form-label">Asunto</label>
                            <input type="text" class="form-control" id="asunto" name="asunto" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="5" required></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection