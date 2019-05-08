@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
     <table border="1">
     	 <tr>
            <th>ID</th>
            <th>Nombre ventas</th>
        </tr>
    @foreach($ventas as $venta)
             <tr>
                   <td>
                    {{$venta->idVenta}}
                   </td>
                   <td>
                       {{$venta->fecha}}
                   </td>
                   <td>
                       {{$venta->total}}
                   </td>
                   <td>
                       {{$venta->can_art}}
                   </td>
                   <td>
                       {{$venta->descrip}}
                   </td>
               </tr>
    @endforeach
@endsection