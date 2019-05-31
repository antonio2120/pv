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
            <th scope="col">ID cliente</th>
            <th scope="col">Fecha de inicio</th>
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
            <tr id="renglon_{{$apartado->id}}">
                <td scope="row">{{$apartado->id}}</td>
                <td>{{$apartado->clientes_id}}</td>
                <td>{{$apartado->fecha_inicio}}</td>
                <td>{{$apartado->fecha_fin}}</td>
                <td>{{$apartado->anticipo}}</td>
                <td>{{$apartado->total}}</td>
                <td>{{$apartado->empleados_id}}</td>
                <td>
        @endforeach
        </tbody>
    </table>
    <h6>Numero de registros: {{$numRegistros}}</h6>

@endsection
