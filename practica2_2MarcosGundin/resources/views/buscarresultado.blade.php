@extends('plantilla')

@section('titulo', 'Buscarresultado')

@section('contenido')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-6">

      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
      @endif

      <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
          <h4 class="mb-0">Resultado de la búsqueda</h4>
          @if (count($dades) > 0)
            <span class="badge bg-primary rounded-pill">{{ count($dades) }}</span>
          @endif
        </div>

        <div class="card-body p-0">
          @if (count($dades) == 0)
            <div class="text-center py-5">
              <div class="fs-1">🚫</div>
              <h5 class="mt-2">Sin resultados</h5>
              <p class="text-muted mb-0">No se ha encontrado ningún coche con esa matrícula.</p>
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
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dades as $i)
                    <tr>
                      <td class="ps-4 fw-semibold">{{ $i->matricula }}</td>
                      <td>{{ $i->marca }}</td>
                      <td>{{ $i->modelo }}</td>
                      <td>{{ $i->año }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif
        </div>

        <div class="card-footer bg-white text-center py-3">
          <a href="{{ url()->previous() }}" class="btn btn-outline-primary">← Nueva búsqueda</a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection