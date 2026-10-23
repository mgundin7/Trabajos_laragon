@extends('plantilla')

@section('titulo', 'Dónde estamos')

@section('contenido')

<div class="container mt-5">

    <h1>📍 Dónde estamos</h1>

    <p>
        Puedes encontrarnos en:
    </p>

    <div class="card p-4">

        <h3>AutoCars</h3>

        <p>
            Calle de los Coches, 21
        </p>

        <p>
            Guadalajara
        </p>

        <p>
            Teléfono: 900 123 456
        </p>

        <p>
            Horario: 9:00 - 20:00
        </p>

    </div>

    <img
        src="https://images.unsplash.com/photo-1487754180451-c456f719a1fc?auto=format&fit=crop&w=900&q=80"
        class="img-fluid rounded mt-4"
        width="700"
        alt="Taller de coches">

</div>

@endsection