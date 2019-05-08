@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    @foreach($clientes as $cliente)
               <li>{{$cliente->nombres}}</li>
               <li>{{$cliente->apaterno}}</li>
               <li>{{$cliente->amaterno}}</li>
               <li>{{$cliente->direccion}}</li>
               <li>{{$cliente->telefono}}</li>
               <li>{{$cliente->correo}}</li>
    @endforeach
@endsection