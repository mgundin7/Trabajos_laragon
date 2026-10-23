@extends('plantilla')

@section('titulo', 'Modificar')

@section('contenido')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">

      <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
          <h4 class="mb-0">Modificar coche</h4>
          <span class="badge bg-primary rounded-pill">{{ count($dades) }}</span>
        </div>

        @if (count($dades) == 0)
          <div class="card-body text-center py-5">
            <div class="fs-1">🚗</div>
            <p class="text-muted mb-0 mt-2">No hay coches para modificar.</p>
          </div>
        @else
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead class="table-light">
                <tr>
                  <th class="ps-4">Matrícula</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Año</th>
                  <th class="text-end pe-4">Acción</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dades as $i)
                  <tr>
                    <td class="ps-4 fw-semibold">{{ $i->matricula }}</td>
                    <td>{{ $i->marca }}</td>
                    <td>{{ $i->modelo }}</td>
                    <td>{{ $i->año }}</td>
                    <td class="text-end pe-4">
                      <a href="/modificar/{{ $i->matricula }}" class="btn btn-sm btn-outline-primary">Editar</a>
                    </td>
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