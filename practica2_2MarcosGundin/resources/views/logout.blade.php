@extends('plantilla')

@section('titulo', 'Logout')

@section('contenido')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-5">

      <div class="card shadow-sm border-0">
        <div class="card-header bg-white text-center py-4">
          <div class="fs-1">👋</div>
          <h4 class="mb-0 mt-2">Cerrar sesión</h4>
        </div>

        <div class="card-body p-4 text-center">
          <p class="text-muted mb-4">¿Seguro que quieres cerrar tu sesión?</p>

          <div class="d-flex justify-content-center gap-2">
            <a href="#" class="btn btn-danger">Sí, salir</a>
            <a href="/consultar" class="btn btn-outline-secondary">Cancelar</a>
          </div>
        </div>

        <div class="card-footer bg-white text-center py-3">
          <a href="/login" class="btn btn-outline-primary">Ir al login</a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection