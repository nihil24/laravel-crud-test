@extends('layouts.app')

@section('content')
<h1>Empleados</h1>

@if ( session('mensaje') )

<div class="alert alert-success">{{ session('mensaje') }}</div>
@endif

<form method="POST" action="{{ route('empleados.agregar') }}">
  @csrf
  @error('nombre')
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    El nombre es requerido
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @enderror @if ($errors->has('descripcion'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    La descripción es requerida
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  <form method="POST" action="{{ route('empleados.agregar') }}">
      @csrf
      <div class="form-group">
        <div class="col-sm-10">
          <label class="col-sm-2 col-form-label-sm">Ingrese Nombre</label>
        </div>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm col-sm-6" name="nombre" placeholder="Nombre" 
          value="{{ old('nombre') }}">
        </div>
      </div>
      <div class="form-group">
          <div class="col-sm-10">
            <label class="col-sm-2 col-form-label-sm">Ingrese Descripcion</label>
          </div>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm col-sm-6" name="descripcion" placeholder="Descripcion" 
            value="{{ old('descripcion') }}">
          </div>
        </div>  
        <div class="form-group">
            <div class="col-sm-10">
              <button class="btn btn-dark btn-lg col-sm-6" type="submit">
                Agregar
              </button>
            </div>
        </div>
      </div>    
  </form>
</form>

<div class="table-responsive">
  <table class="table table-striped table-dark table-bordered">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Detalle</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($empleados as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->nombre}}</td>
        <td>{{$item->descripcion}}</td>
        <td><a href="{{ route ('empleados.detalle', $item) }}" class="btn btn-info">Detalles</a></td>
        <td><a href="{{route('empleados.editar', $item)}}" class="btn btn-primary btn-sm">Editar</a>
        <form action="{{ route('empleados.eliminar', $item) }}" class="d-inline" method="POST">
          @method('DELETE')
          @csrf 
          <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
        </form>
      </tr> 
      @endforeach
    </tbody>
  </table>
</div> 
</div>   

@endsection