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
            <th scope="col">nombre</th>
            <th scope="col">direccion</th>
            <th scope="col">telefono</th>
 
        </tr>
        </thead>
        <tbody>
        @foreach($sucursal as $sucursal)
            <tr id="renglon_{{$sucursal->id}}">
                <td scope="row">{{$sucursal->id}}</td>
                <td>{{$sucursal->nombre}}</td>
                <td>{{$sucursal->direccion}}</td>
                <td>{{$sucursal->telefono}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <h6>Numero de registros: {{$numRegistros}}</h6>

@endsection
