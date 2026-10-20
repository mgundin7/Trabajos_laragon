<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>@yield('titulo') - AutoCars</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="/">
            🚗 AutoCars
        </a>

        <div>
            @auth
                <a class="text-white me-3 text-decoration-none" href="/">Inicio</a>
                <a class="text-white me-3 text-decoration-none" href="/nosaltres">Nosotros</a>
                <a class="text-white me-3 text-decoration-none" href="/onestem">Dónde estamos</a>
                <a class="text-white me-3 text-decoration-none" href="/insertar">Insertar</a>
                <a class="text-white me-3 text-decoration-none" href="/buscar">Buscar</a>
                <a class="text-white me-3 text-decoration-none" href="/consultar">Consultar</a>
                <a class="text-white me-3 text-decoration-none" href="/borrar">Borrar</a>
                <a class="text-white me-3 text-decoration-none" href="/modificar">Modificar</a>
                <a class="text-white me-3 text-decoration-none" href="{{ route('ce.consultar') }}">Consultar coches-extras</a>
                <a class="text-white me-3 text-decoration-none" href="{{ route('ce.insertarForm') }}">Insertar coches-extras</a>
                <a class="text-white text-decoration-none" href="{{ route('logout') }}">Logout</a>
            @else
                <a class="text-white me-3 text-decoration-none" href="{{ route('login') }}">Login</a>
                <a class="text-white text-decoration-none" href="{{ route('registro') }}">Registro</a>
            @endauth
        </div>

    </div>
</nav>

<main class="flex-grow-1">
    @if (session('despedida'))
    <div class="container mt-3">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('despedida') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    </div>
    @endif
    
    @yield('contenido')


</main>

<footer class="bg-dark text-white text-center p-3 mt-5">
    AutoCars - Concesionario de coches
</footer>

</body>
</html>