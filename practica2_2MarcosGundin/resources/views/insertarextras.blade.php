@extends('plantilla')

@section('titulo', 'insertarextras')

@section('contenido')
<h2>Asignar extra a un coche</h2>

@if($errors->any())
    <p style="color:red">{{ $errors->first() }}</p>
@endif

<form method="POST" action="{{ route('ce.insertar') }}">
    @csrf

    <label>Coche:</label>
    <select name="matricula">
        @foreach($coches as $c)
            <option value="{{ $c->matricula }}">{{ $c->matricula }} - {{ $c->marca }} {{ $c->modelo }}</option>
        @endforeach
    </select>

    <label>Extra:</label>
    <select name="id_extra">
        @foreach($extras as $e)
            <option value="{{ $e->id_extra }}">{{ $e->nombre }}</option>
        @endforeach
    </select>

    <button type="submit">Guardar</button>
</form>
@endsection