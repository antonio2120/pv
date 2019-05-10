@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Total</th>
            <th scope="col">ID del Empleado</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ventas as $venta)

            <tr>
                <th scope="row">{{$venta->id}}</th>
                <td>{{$venta->fecha}}</td>
                <td>{{$venta->hora}}</td>
                <td>{{$venta->total}}</td>
                <td>{{$venta->empleado_id}}</td>
                <td><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
                <td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        @endforeach


        </tbody>
    </table>


    </table>
@endsection