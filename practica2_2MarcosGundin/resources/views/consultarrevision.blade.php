@extends('plantilla')

@section('titulo', 'Consultar revisiones')

@section('contenido')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-10">

      @if(session('ok'))
        <div class="alert alert-success">{{ session('ok') }}</div>
      @endif

      <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
          <h4 class="mb-0">Revisiones</h4>
          <div class="d-flex align-items-center gap-3">
            <span class="badge bg-primary rounded-pill">{{ count($dades) }}</span>
            @if(auth()->user()->esAdmin())
              <a href="{{ route('revisiones.insertarForm') }}" class="btn btn-dark btn-sm">+ Añadir</a>
            @endif
          </div>
        </div>

        @if (count($dades) == 0)
          <div class="card-body text-center py-5">
            <div class="fs-1">🔧</div>
            <p class="text-muted mb-0 mt-2">No hay revisiones registradas.</p>
          </div>
        @else
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead class="table-light">
                <tr>
                  <th class="ps-4">ID</th>
                  <th>Matrícula</th>
                  <th>Coche</th>
                  <th>Fecha</th>
                  <th>Descripción</th>
                  <th class="text-end pe-4">Precio</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dades as $r)
                  <tr>
                    <td class="ps-4">{{ $r->id_revisiones }}</td>
                    <td>
                      <a href="/consultar/{{ $r->matricula }}" class="fw-semibold text-decoration-none">
                        {{ $r->matricula }}
                      </a>
                    </td>
                    <td>{{ $r->coche?->marca }} {{ $r->coche?->modelo }}</td>
                    <td>{{ $r->fecha->format('d/m/Y') }}</td>
                    <td>{{ $r->descripcion }}</td>
                    <td class="text-end pe-4">{{ number_format($r->precio, 2, ',', '.') }} €</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif
      </div>

    </div>
  </div>
</div>
@endsection