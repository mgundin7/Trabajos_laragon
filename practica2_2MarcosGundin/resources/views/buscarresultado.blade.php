@extends('plantilla')

@section('titulo', 'Buscarresultado')

@section('contenido')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Resultado de la búsqueda</h2>
        @if (count($dades) > 0)
            <span class="text-muted">{{ count($dades) }} registros</span>
        @endif
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        @if (count($dades) == 0)
            <div class="card-body text-center text-muted py-4">
                No se ha encontrado ningún coche con esa matrícula.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">Matrícula</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Año</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dades as $i)
                            <tr>
                                <td class="ps-3">{{ $i->matricula }}</td>
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

    <a href="{{ url()->previous() }}" class="btn btn-outline-dark mt-3">← Nueva búsqueda</a>

</div>
@endsection