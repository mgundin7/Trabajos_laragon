@extends('plantilla')

@section('titulo', 'consultartaules')

@section('contenido')
<h2>Coches y extras (N:M)</h2>

@if(session('ok'))
    <p style="color:green">{{ session('ok') }}</p>
@endif

<table border="1">
    <tr>
        <th>Matrícula</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Extra</th>
        <th>Precio</th>
    </tr>
    @foreach($relaciones as $r)
        <tr>
            <td>{{ $r->matricula }}</td>
            <td>{{ $r->marca }}</td>
            <td>{{ $r->modelo }}</td>
            <td>{{ $r->extra }}</td>
            <td>{{ $r->precio }} €</td>
        </tr>
    @endforeach
</table>
@endsection