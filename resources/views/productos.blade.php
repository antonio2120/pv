@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    @foreach($productos as $producto)
               <li>{{$producto->nombre}}</li>
    @endforeach
@endsection
