@extends('plantilla')

@section('seccion')
    <h1> Editar nota {{$nota->id}}</h1>
    <!--Agregamos la variable de seccion con if para validar el mensaje-->

    @if (session('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}} </div>

    @endif

    <form action="{{ route('actualizar', $nota->id)}}" method="POST">
        <!--Este anotacion method usas el PUT para remplazar el POST--->
        @method('PUT')
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
  
            <input
             type="text" name="nombre" 
             placeholder="Nombre" 
             class="form-control mb-2" 
             value="{{ $nota->nombre }}" >

            <input type="text" name="descripcion" 
            placeholder="Descripcion" 
            class="form-control mb-2" 
            value="{{  $nota->descripcion }}">
            <button class="btn btn-warning btn-block" type="submit">Agregar</button>
            <p>
  
          </form>
@endsection