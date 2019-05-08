@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
     <table border="1">
     	 <tr>
            <th>ID</th>
            <th>Nombre Categoria</th>
        </tr>
    @foreach($tiene as $tiene)
             <tr>
                   <td>
                    {{$tiene->ID}}
                   </td>
                   <td>
                       {{$tiene->id_tiene}}
                   </td>
                   <td>
                       {{$tiene->id_venta}}
                   </td>
                   <td>
                       {{$tiene->codigo_barras}}
                   </td>
                   <td>
                       {{$tiene->cantidadPro}}
                   </td>
               </tr>
    @endforeach
@endsection