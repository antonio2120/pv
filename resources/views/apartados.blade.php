@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">ID cliente</th>
            <th scope="col">Fehca de inicio</th>
            <th scope="col">Fecha final</th>
            <th scope="col">Anticipo</th>
            <th scope="col">Total</th>
            <th scope="col">ID de Empleado</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($apartados as $apartado)

            <tr>
                <th scope="row">{{$apartado->id}}</th>
                <td>{{$apartado->clientes_id}}</td>
                <td>{{$apartado->fecha_inicio}}</td>
                <td>{{$apartado->fecha_fin}}</td>
                <td>{{$apartado->anticipo}}</td>
                <td>{{$apartado->total}}</td>
                <td>{{$apartado->empleados_id}}</td>
                <td><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
                <td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        @endforeach


        </tbody>
    </table>


    </table>

@endsection
