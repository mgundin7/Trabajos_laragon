@extends('plantilla')

@section('titulo', 'Consultar')

@section('contenido')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-6">

      <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
          <h4 class="mb-0">Coches disponibles</h4>
          <span class="badge bg-primary rounded-pill">{{ count($dades) }}</span>
        </div>

        @if (count($dades) == 0)
          <div class="card-body text-center py-5">
            <div class="fs-1">🚗</div>
            <p class="text-muted mb-0 mt-2">No hay coches registrados.</p>
          </div>
        @else
          <div class="list-group list-group-flush">
            @foreach ($dades as $i)
              <a href="/consultar/{{ $i->matricula }}"
                 class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                <span>
                  <span class="fw-semibold">{{ $i->marca }}</span>
                  <small class="text-muted ms-2">{{ $i->matricula }}</small>
                </span>
                <span class="text-muted">›</span>
              </a>
            @endforeach
          </div>
        @endif
      </div>

    </div>
  </div>
</div>
@endsection