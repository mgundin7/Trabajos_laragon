@extends('plantilla')

@section('titulo', 'Usuarios')

@section('contenido')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Usuarios</h2>
        <a href="{{ route('usuarios.create') }}" class="btn btn-dark">+ Nuevo usuario</a>
    </div>

    @if(session('ok'))
        <div class="alert alert-success">{{ session('ok') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th class="text-end pe-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $u)
                        <tr>
                            <td class="ps-3">{{ $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                <span class="badge {{ $u->rol === 'admin' ? 'bg-danger' : 'bg-secondary' }}">
                                    {{ $u->rol }}
                                </span>
                            </td>
                            <td class="text-end pe-3">
                                <a href="{{ route('usuarios.edit', $u) }}" class="btn btn-sm btn-outline-primary">Modificar</a>

                                <form action="{{ route('usuarios.destroy', $u) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Borrar este usuario?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection