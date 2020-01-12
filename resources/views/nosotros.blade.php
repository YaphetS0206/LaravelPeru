@extends('plantilla')

@section('seccion')
    
<h1> Este es mi equipo de trabajo </h1>

@foreach ($equipo as $nombres)
<a href="{{route('nosotros',$nombres)}}" class="h4 text-danger">{{$nombres}}</a><br>   
@endforeach

@if(!empty($nombre))
   @switch($nombre)
       @case($nombre=='Ignacio')
           <h2 class="mt-5">El nombre es {{$nombre}}:</h2>
           <p> Funciono el nombre de Ignacio</p>
           @break
       @case($nombre=='Juanito')
           <h2 class="mt-5"> El nombre es {{$nombre}}:</h2>
           <p>Funciono el nombre de Juanito</p>
           @break

           @case($nombre=='Pedrito')
           <h2 class="mt-5"> El nombre es {{$nombre}}:</h2>
           <p>Funciono el nombre de Pedrito</p>
           @break
       @default
           
   @endswitch

@endif

@endsection