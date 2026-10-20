@extends('plantilla')

@section('titulo', 'Insertar coche')

@section('contenido')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow">

                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">Insertar coche</h3>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('dades-insertar') }}" method="POST">

                            @csrf

                            {{-- Mensaje de matrícula duplicada --}}
                            @if (session('messagematriculaerror'))
                                <div class="alert alert-danger">
                                    {{ session('messagematriculaerror') }}
                                </div>
                            @endif

                            {{-- Mensaje de inserción correcta --}}
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- Error de matrícula --}}
                            @error('matricula')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- Error de marca --}}
                            @error('marca')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- Error de modelo --}}
                            @error('modelo')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <!-- Matrícula -->
                            <div class="mb-3">
                                <label for="matricula" class="form-label">
                                    Matrícula
                                </label>

                                <input type="text" class="form-control" id="matricula" name="matricula"
                                    value="{{ old('matricula') }}" placeholder="Ej. 1234ABC" maxlength="7">
                            </div>

                            <!-- Marca -->
                            <div class="mb-3">
                                <label for="marca" class="form-label">
                                    Marca
                                </label>

                                <input type="text" class="form-control" id="marca" name="marca"
                                    value="{{ old('marca') }}" placeholder="Ej. BMW">
                            </div>

                            <!-- Modelo -->
                            <div class="mb-3">
                                <label for="modelo" class="form-label">
                                    Modelo
                                </label>

                                <input type="text" class="form-control" id="modelo" name="modelo"
                                    value="{{ old('modelo') }}" placeholder="Ej. Serie 3">
                            </div>
                            <div class="mb-3">
                                <label for="año" class="form-label fw-semibold">
                                    Año
                                </label>

                                <input type="number" class="form-control" name="año" id="año"
                                    value="{{ old('año') }}" placeholder="Ej: 2020">

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-dark mt-4">
                                        Insertar coche
                                    </button>
                                </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
