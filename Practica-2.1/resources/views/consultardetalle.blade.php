@extends('plantilla')

@section('titulo', 'Consultardetalle')

@section('contenido')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-5">

      @if (count($dades) == 0)
        <div class="alert alert-warning text-center">No se ha encontrado el coche.</div>
      @else
        <div class="card shadow-sm border-0">
          <div class="card-header bg-white text-center py-4">
            <div class="fs-1">🚗</div>
            <h4 class="mb-0 mt-2">{{ $dades[0]->marca }} {{ $dades[0]->modelo }}</h4>
          </div>

          <div class="card-body p-4">
            <dl class="row mb-0">
              <dt class="col-5 text-muted fw-normal">Matrícula</dt>
              <dd class="col-7 fw-semibold">{{ $dades[0]->matricula }}</dd>

              <dt class="col-5 text-muted fw-normal">Marca</dt>
              <dd class="col-7 fw-semibold">{{ $dades[0]->marca }}</dd>

              <dt class="col-5 text-muted fw-normal">Modelo</dt>
              <dd class="col-7 fw-semibold">{{ $dades[0]->modelo }}</dd>

              <dt class="col-5 text-muted fw-normal">Año</dt>
              <dd class="col-7 fw-semibold mb-0">{{ $dades[0]->año }}</dd>

            </dl>

          </div>



          <div class="card-footer bg-white text-center py-3">
            <a href="/consultar" class="btn btn-outline-primary">← Volver al listado</a>
          </div>
        </div>
      @endif

    </div>
  </div>
</div>
@endsection