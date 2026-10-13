@extends('plantilla')

@section('titulo', 'Registro')

@section('contenido')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-5">

      <div class="card shadow-sm border-0">
        <div class="card-header bg-white text-center py-4">
          <div class="fs-1">📝</div>
          <h4 class="mb-0 mt-2">Crear cuenta</h4>
        </div>

        <div class="card-body p-4">
          @if($errors->any())
            <p style="color:red">{{ $errors->first() }}</p>
            @endif

        <form method="POST" action="{{ route('registro') }}">
            @csrf
            <div class="mb-3">
              <label for="nombre" class="form-label text-muted">Nombre</label>
              <input type="text" class="form-control" id="nombre" placeholder="Tu nombre">
            </div>

            <div class="mb-3">
              <label for="email" class="form-label text-muted">Correo electrónico</label>
              <input type="email" class="form-control" id="email" placeholder="tucorreo@ejemplo.com">
            </div>

            <div class="mb-3">
              <label for="password" class="form-label text-muted">Contraseña</label>
              <input type="password" class="form-control" id="password" placeholder="••••••••">
            </div>

            <div class="mb-4">
              <label for="password2" class="form-label text-muted">Repetir contraseña</label>
              <input type="password" class="form-control" id="password2" placeholder="••••••••">
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Registrarme</button>
            </div>
          </form>
        </div>

        <div class="card-footer bg-white text-center py-3">
        <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection