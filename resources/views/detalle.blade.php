@extends('plantilla')

@section('seccion')

<h1>Detalle Nota:</h1>
<h4>id: {{$nota->id}}</h4>
<h4>Nombre: {{$nota->nombre}}</h4>
<h4>detalle: {{$nota->descripcion}}</h4>

@endsection