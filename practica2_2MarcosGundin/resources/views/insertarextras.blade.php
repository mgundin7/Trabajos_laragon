@extends('plantilla')

@section('titulo', 'insertarextras')

@section('contenido')
<div class="container py-4">

    <h2 class="h4 mb-3">Asignar extra a un coche</h2>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('ce.insertar') }}">
                @csrf

                <div class="mb-3">
                    <label for="matricula" class="form-label">Coche</label>
                    <select name="matricula" id="matricula" class="form-select">
                        @foreach($coches as $c)
                            <option value="{{ $c->matricula }}">
                                {{ $c->matricula }} - {{ $c->marca }} {{ $c->modelo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_extra" class="form-label">Extra</label>
                    <select name="id_extra" id="id_extra" class="form-select">
                        @foreach($extras as $e)
                            <option value="{{ $e->id_extra }}">{{ $e->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-dark">Guardar</button>
            </form>
        </div>
    </div>

</div>
@endsection