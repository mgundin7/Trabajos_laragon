@extends('plantilla')

@section('titulo', 'Añadir revisión')

@section('contenido')
<div class="container py-4">

    <h2 class="h4 mb-3">Añadir revisión</h2>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('revisiones.insertar') }}">
                @csrf

                <div class="mb-3">
                    <label for="matricula" class="form-label">Coche</label>
                    <select name="matricula" id="matricula" class="form-select">
                        @foreach($coches as $c)
                            <option value="{{ $c->matricula }}" {{ old('matricula') === $c->matricula ? 'selected' : '' }}>
                                {{ $c->matricula }} - {{ $c->marca }} {{ $c->modelo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha"
                           value="{{ old('fecha', date('Y-m-d')) }}" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion"
                           value="{{ old('descripcion') }}" placeholder="Ej. Cambio de aceite y filtro" maxlength="255" required>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio (€)</label>
                    <input type="number" step="0.01" min="0" class="form-control" id="precio" name="precio"
                           value="{{ old('precio') }}" required>
                </div>

                <button type="submit" class="btn btn-dark">Guardar</button>
                <a href="{{ route('revisiones.consultar') }}" class="btn btn-outline-secondary">Cancelar</a>
            </form>
        </div>
    </div>

</div>
@endsection