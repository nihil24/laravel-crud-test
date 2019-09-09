@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Agregar Empleado</span>
                    <a href="/empleados" class="btn btn-primary btn-sm">Volver a lista de Empleados...</a>
                </div>
                <div class="card-body">     
                  @if ( session('mensaje') )
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                  @endif
                  <form method="POST" action="/empleados">
                    @csrf
                    @error('nombre')
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        El nombre es requerido
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @enderror 
                    @if ($errors->has('cargo'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        El Cargo es requerido
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif

                    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2"
                      value="{{ old('nombre') }}" />
                    
                    <input type="text" name="cargo" placeholder="Cargo" class="form-control mb-2" 
                      value="{{ old('cargo') }}" />
                    
                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection