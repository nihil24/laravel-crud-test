@extends('plantilla')

@section('seccion')
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

            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2"
              value="{{ old('nombre') }}">
            <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2"
            value="{{ old('descripcion') }}">
            
            <button class="btn btn-primary btn-lg" type="submit">Agregar</button>
          </form>

        <table class="table">
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
                            <td><a href="{{ route ('empleados.detalle', $item) }}" class="btn btn-info">
                                Detalles
                            </a>
                            </td>
                            <td>
                              <a href="{{route('empleados.editar', $item)}}" class="btn btn-primary btn-sm">Editar</a>
                            
                              <form action="{{ route('empleados.eliminar', $item) }}" class="d-inline" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form> 
                            </td>
                        </tr>  
                    @endforeach
                        
                                      

                </tbody>
              </table>
    </div>   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection