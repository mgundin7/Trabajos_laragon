@extends('plantilla')

@section('titulo', 'consultartaules')

@section('contenido')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Coches y extras</h2>
        <span class="text-muted">{{ count($relaciones) }} registros</span>
    </div>

    @if(session('ok'))
        <div class="alert alert-success">{{ session('ok') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Matrícula</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Extra</th>
                        <th class="text-end pe-3">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($relaciones as $r)
                        <tr>
                            <td class="ps-3">{{ $r->matricula }}</td>
                            <td>{{ $r->marca }}</td>
                            <td>{{ $r->modelo }}</td>
                            <td>{{ $r->extra }}</td>
                            <td class="text-end pe-3">{{ number_format($r->precio, 2, ',', '.') }} €</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                No hay relaciones para mostrar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection