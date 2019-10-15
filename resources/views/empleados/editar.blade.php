@extends('layouts.main')

@section('content')

  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Editar Empleado</span>
                        <a href="/empleados" class="btn btn-primary btn-sm">Volver a lista de Empleados...</a>
                    </div>
                    <div class="card-body">     
                      @if ( session('mensaje') )
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                      @endif
                      <form action="{{ route('empleados.update', $empleados->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            
                            @error('nombre')
                              <div class="alert alert-danger">
                                  El nombre es obligatorio
                              </div>
                            @enderror

                            @error('cargo')
                                <div class="alert alert-danger">
                                    El cargo es obligatorio
                                </div>
                            @enderror

                            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" 
                                value="{{ $empleados->nombre }}">
                            <input type="text" name="cargo" placeholder="Cargo" class="form-control mb-2" 
                                value="{{ $empleados->cargo }}">
                            <button class="btn btn-warning btn-block" type="submit">Editar</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </form>
@endsection