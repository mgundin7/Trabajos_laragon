@extends('plantilla')

@section('titulo', 'Modificarfila')

@section('contenido')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-7 col-lg-5">

      <a href="/modificar" class="btn btn-outline-secondary btn-sm mb-3">← Volver</a>

      <div class="card shadow-sm border-0">
        <div class="card-body p-4">

          <form action="{{ route('dades-actualitzarfila', $fila[0]->matricula) }}" method="POST">
            @csrf
            @method('PATCH')

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <div class="mb-3">
              <label for="matricula" class="form-label fw-semibold">Matrícula</label>
              <input type="text" class="form-control @error('matricula') is-invalid @enderror"
                     name="matricula" id="matricula" value="{{ $fila[0]->matricula }}">
              @error('matricula')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="marca" class="form-label fw-semibold">Marca</label>
              <input type="text" class="form-control @error('marca') is-invalid @enderror"
                     name="marca" id="marca" value="{{ $fila[0]->marca }}">
              @error('marca')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-4">
              <label for="modelo" class="form-label fw-semibold">Modelo</label>
              <input type="text" class="form-control @error('modelo') is-invalid @enderror"
                     name="modelo" id="modelo" value="{{ $fila[0]->modelo }}">
              @error('modelo')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-4">
              <label for="año" class="form-label fw-semibold">Año</label>
              <input type="number" class="form-control @error('año') is-invalid @enderror"
                     name="año" id="año" value="{{ $fila[0]->año }}">
              @error('año')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg w-100">Enviar</button>
          </form>

        </div>
      </div>

    </div>
  </div>
</div>
@endsection