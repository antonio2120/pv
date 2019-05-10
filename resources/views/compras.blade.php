@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <table border="1">
        <tr>
            <th>Fecha </th>
            <th>Total </th>
            <th>can_art </th>
            <th>descrip</th>    
        </tr>
        @foreach($compras as $compra)
               <tr>
                   <td>
                    {{$compra->fecha}}
                   </td>
                   <td>
                       {{$compra->total}}
                   </td>
                   <td>
                       {{$compra->can_art}}
                   </td>
                   <td>
                       {{$compra->descrip}}
                   </td>
               </tr>
        @endforeach
    </table>
@endsection