@extends('layout_principal')
@section('´content')
    <h1>{{ $title }}</h1>
    @foreach($ventas as $venta): ?>
               <li>{{$venta->fecha}}</li>
    @endforeach
@endsection