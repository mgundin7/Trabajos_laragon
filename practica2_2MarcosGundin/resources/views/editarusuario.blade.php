@extends('plantilla')

@section('titulo', 'Modificar usuario')

@section('contenido')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-5">

      <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary btn-sm mb-3">← Volver</a>

      <div class="card shadow-sm border-0">
        <div class="card-header bg-white text-center py-4">
          <div class="fs-1">✏️</div>
          <h4 class="mb-0 mt-2">Modificar usuario</h4>
        </div>

        <div class="card-body p-4">
          @if($errors->any())
            <p style="color:red">{{ $errors->first() }}</p>
          @endif

          <form method="POST" action="{{ route('usuarios.update', $usuario) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="name" class="form-label text-muted">Nombre</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $usuario->name) }}" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label text-muted">Correo electrónico</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $usuario->email) }}" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label text-muted">Nueva contraseña (vacío = no cambiarla)</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
              <label for="password_confirmation" class="form-label text-muted">Repetir contraseña</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="mb-4">
              <label for="rol" class="form-label text-muted">Rol</label>
              <select name="rol" id="rol" class="form-select">
                <option value="usuari" {{ old('rol', $usuario->rol) === 'usuari' ? 'selected' : '' }}>usuari</option>
                <option value="admin" {{ old('rol', $usuario->rol) === 'admin' ? 'selected' : '' }}>admin</option>
              </select>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection