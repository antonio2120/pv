@extends('layout_principal_pdf')
@section('content')
    <div class="row mt-5">
        <div class="col-8">
            <h1>{{$title}}</h1>
        </div>
    </div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Imágen</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Nombre de usuario</th>
            <th scope="col">Contraseña</th>
        </tr>
        </thead>
        <tbody>
        @foreach($empleados as $empleado)
            <tr id="renglon_{{$empleado->id}}">
                <th scope="row">{{$empleado->id}}</th>
                <td>
                  @if(file_exists(public_path('img/empleados/'.$empleado->id.'.jpg')))
                    <img src="{{url('img/empleados/'.$empleado->id)}}.jpg" width="50px">
                  @endif
              </td>
                <td>{{$empleado->nombre}}</td>
                <td>{{$empleado->apellido}}</td>
                <td>{{$empleado->nombreUsuario}}</td>
                <td>{{$empleado->password}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h6>Numero de registros: {{$numRegistros}}</h6>

@endsection
