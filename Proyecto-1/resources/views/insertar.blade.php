@extends('app')

@section('content')

<div class="mb-3">
    <form action="{{route('dades-insertar')}}" method="POST">
        @csrf
        @if (session('messagednierror') )
            <div class="alert alert-info">{{ session('messagednierror')  }}</div>
        @endif
        @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        @error('nombre')
            <h6 class="alert alert-danger">{{ $message }}</h6>            
        @enderror
        <label for="" class="form-label">dni</label>
        <input type="text" class="form-control" name="dni" id="" aria-describedby="helpId" placeholder=""/>    
 
        <label for="" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder=""/>    
        <label for="" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" id="" aria-describedby="helpId" placeholder=""/>    
 
        <button type="submit"  class="btn btn-primary">Enviar</button>
    </form>
</div>
 
@endsection