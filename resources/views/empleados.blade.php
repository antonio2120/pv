@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    @foreach($empleados as $empleado)
               <li>{{$empleado->nombre}}</li>
               <li>{{$empleado->apellido}}</li>
               <li>{{$empleado->nombreUsuario}}</li>
               <li>{{$empleado->password}}</li>
    @endforeach
@endsection
