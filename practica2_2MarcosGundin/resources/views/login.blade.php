@extends('plantilla')

@section('titulo', 'login')

@section('contenido')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-5">

      <div class="card shadow-sm border-0">
        <div class="card-header bg-white text-center py-4">
          <div class="fs-1">🔐</div>
          <h4 class="mb-0 mt-2">Iniciar sesión</h4>
        </div>

        <div class="card-body p-4">
            @if($errors->any())
                <p style="color:red">{{ $errors->first() }}</p>
            @endif
          <form method="POST" action="{{ route('login_autenticar') }}">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label text-muted">Correo electrónico</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="tucorreo@ejemplo.com" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label text-muted">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
            </div>

            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" id="recordar" name="recordar" value="1">
              <label class="form-check-label text-muted" for="recordar">Recordarme</label>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
          </form>
        </div>

        <div class="card-footer bg-white text-center py-3">
        <p>¿No tienes cuenta? <a href="{{ route('registro') }}">Regístrate</a></p>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection