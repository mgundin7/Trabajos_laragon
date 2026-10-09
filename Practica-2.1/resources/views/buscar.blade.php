@extends('plantilla')

@section('titulo', 'Buscar')

@section('contenido')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-6 col-lg-4">

      <div class="card shadow-sm border-0">
        <div class="card-body p-4">

          <div class="text-center mb-4">
            <div class="fs-1">🔍</div>
            <h3 class="card-title mb-1">Buscar coche</h3>
            <p class="text-muted mb-0">Introduce la matrícula del vehículo</p>
          </div>

          <form name="fbuscar" action="{{ route('dades-buscar') }}" method="POST" novalidate>
            @csrf

            <div class="mb-3">
              <label for="matricula" class="form-label fw-semibold">Matrícula</label>
              <input type="text"
                     class="form-control form-control-lg @error('matricula') is-invalid @enderror"
                     name="matricula"
                     id="matricula"
                     value="{{ old('matricula') }}"
                     placeholder="Ej: 1234ABC"
                     autofocus>
              @error('matricula')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100">Buscar</button>
          </form>

        </div>
      </div>

    </div>
  </div>
</div>
@endsection