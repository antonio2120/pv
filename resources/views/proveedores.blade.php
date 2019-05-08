@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <table border="1">
        <tr>
            <th>Nombre Proveedor</th>
            <th>Direección</th>
            <th>Ciudad</th>
            <th>Teléfono</th>
            <th>Fax</th>
            <th>Correo</th>
        </tr>
        @foreach($proveedores as $proveedor)
               <tr>
                   <td>
                    {{$proveedor->nombre}}
                   </td>
                   <td>
                       {{$proveedor->direccion}}
                   </td>
                   <td>
                       {{$proveedor->ciudad}}
                   </td>
                   <td>
                       {{$proveedor->telefono}}
                   </td>
                   <td>
                       {{$proveedor->fax}}
                   </td>
                   <td>
                       {{$proveedor->correo}}
                   </td>
               </tr>
        @endforeach
    </table>
@endsection