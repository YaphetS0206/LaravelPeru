

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    @extends('plantilla')

    @section('seccion')
    

    <div class="container my-4">
        <h1 class="display-4">Notas</h1>
  <!--Agregamos  la validacion para mostrar el mensaje-->
      @if (session('mensaje'))
        <div class="alert alert-success">
          {{session('mensaje')}}
        </div>
      @endif

    <form action="{{ route('notas.crear')}}" method="POST">
      <!-- TOKEN-->
          @csrf

          <!--mandando error si no son validos-->

          @error('nombre')
            <div class="alert alert-danger">
              El nombre es obligatorio
            </div>
          @enderror

          @error('descripcion')
          <div class="alert alert-danger">
              La descripcion es obligatorio
          </div>
        @enderror

          <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ old('nombre') }}" >
          <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2" value="{{ old('nombre') }}">
          <button class="btn btn-primary btn-block" type="submit">Agregar</button>
          <p>

        </form>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($notas as $datos)
              <tr>
                <th scope="row">{{$datos->id}}</th>
                <td>
                <a href="{{route('detalle', $datos)}}">
                    {{$datos->nombre}}
                  </a>
                  
                </td>
                <td>{{$datos->descripcion}}</td>
                <td>
                <a href="{{route('notas.editar',$datos)}}" class="btn btn-warning btn-sm">Editar</a>
               
                <form action="{{route('notas.eliminar', $datos)}}" method="POST" class="d-inline">
                  @method('DELETE')
                       @csrf
                 
                  <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>

                </form>               
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>

    {{$notas->links()}}
    @endsection
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>