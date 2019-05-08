@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <table border="1">
        <tr>
            <th>Nombre </th>
            <th>Apellido </th>
            <th>Nombre de usuario </th>
            <th>Contraseña </th>    
        </tr>
        @foreach($empleados as $empleado)
               <tr>
                   <td>
                    {{$empleado->nombre}}
                   </td>
                   <td>
                       {{$empleado->apellido}}
                   </td>
                   <td>
                       {{$empleado->nombreUsuario}}
                   </td>
                   <td>
                       {{$empleado->password}}
                   </td>
               </tr>
        @endforeach
    </table>
@endsection