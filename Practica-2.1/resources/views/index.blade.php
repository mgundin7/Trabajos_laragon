@extends('plantilla')

@section('titulo', 'Inicio')

@section('contenido')

<div class="container mt-5">

    <div class="text-center">

        <h1>🚗 Bienvenidos a AutoCars</h1>

        <p class="lead">
            Tu concesionario de coches de confianza
        </p>

        <img
            src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=900&q=80"
            class="img-fluid rounded"
            width="700"
            alt="Coche">

    </div>


    <div class="row mt-5">

        <div class="col-md-4">
            <div class="card p-3">
                <h3>🚘 Coches nuevos</h3>
                <p>
                    Tenemos coches nuevos de diferentes marcas.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h3>🔧 Taller</h3>
                <p>
                    También ofrecemos servicios de mantenimiento.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h3>💰 Buen precio</h3>
                <p>
                    Encuentra el coche que mejor se adapte a ti.
                </p>
            </div>
        </div>

    </div>

</div>

@endsection