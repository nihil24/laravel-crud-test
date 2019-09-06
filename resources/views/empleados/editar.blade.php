@extends('plantilla')

@section('seccion')
    <h1>Editar Empleado</h1>
    @if (session('mensaje'))
      <div class="alert alert-success">
          {{ session('mensaje') }}
      </div>
  @endif
  <form action="{{ route('empleados.update', $empleados->id) }}" method="POST">
    @method('PUT')
    @csrf

    @error('nombre')
        <div class="alert alert-danger">
            El nombre es obligatorio
        </div>
    @enderror

    @error('descripcion')
        <div class="alert alert-danger">
            La descripción es obligatoria
        </div>
    @enderror

    <div class="forms-group row">
        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" 
            value="{{ $empleados->nombre }}">
        <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2" 
            value="{{ $empleados->descripcion }}">
    </div>   
    
    <button class="btn btn-secondary btn-lg" type="submit">Editar</button>
  </form>
@endsection