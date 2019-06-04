@extends('layout_principal_pdf')
@section('content')

        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand"><h1>{{$title}}</h1></a>
        </nav>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Total</th>
            <th scope="col">ID del Empleado</th>

        </tr>
        </thead>
        <tbody>
        @foreach($ventas as $venta)

            <tr id="renglon_{{$venta->id}}">
                <th scope="row">{{$venta->id}}</th>
                <td>{{$venta->fecha}}</td>
                <td>{{$venta->hora}}</td>
                <td>{{$venta->total}}</td>
                <td>{{$venta->empleado_id}}</td>

            </tr>
        @endforeach


        </tbody>
    </table>


    </table>
        <h6>NUMERO DE VENTAS REGISTRADAS EN ESTA VISTA: {{$numRegistros}}</h6>
        </div>

@endsection