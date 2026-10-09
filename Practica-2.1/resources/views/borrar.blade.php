@extends('plantilla')

@section('titulo', 'Borrar')

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
          <h4 class="mb-0">Borrar coche</h4>
          <span class="badge bg-primary rounded-pill">{{ count($dades) }}</span>
        </div>

        @if (count($dades) == 0)
          <div class="card-body text-center py-5">
            <div class="fs-1">🚗</div>
            <p class="text-muted mb-0 mt-2">No quedan coches para borrar.</p>
          </div>
        @else
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead class="table-light">
                <tr>
                  <th class="ps-4">Marca</th>
                  <th>Matrícula</th>
                  <th>Modelo</th>
                  <th>Año</th>
                  <th class="text-end pe-4">Acción</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dades as $i)
                  <tr>
                    <td class="ps-4 fw-semibold">{{ $i->marca }}</td>
                    <td class="text-muted">{{ $i->matricula }}</td>
                    <td class="text-muted">{{ $i->modelo }}</td>
                    <td class="text-muted">{{ $i->año }}</td>
                    <td class="text-end pe-4">
                      <form action="/borrar/{{ $i->matricula }}" method="POST" class="d-inline"
                            onsubmit="return confirm('¿Seguro que quieres borrar este coche?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                      </form>
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