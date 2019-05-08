@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
     <table border="1">
     	 <tr>
            <th>ID</th>
            <th>Nombre ventas</th>
        </tr>
    @foreach($venta as $ventas)
             <tr>
                   <td>
                    {{$ventas->idVenta}}
                   </td>
                   <td>
                       {{$ventas->fecha}}
                   </td>
                   <td>
                       {{$ventas->total}}
                   </td>
                   <td>
                       {{$ventas->can_art}}
                   </td>
                   <td>
                       {{$ventas->descrip}}
                   </td>
               </tr>
    @endforeach
@endsection