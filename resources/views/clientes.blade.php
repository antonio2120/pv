@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nombre(s)</th>
            <th scope="col">Apaterno</th>
            <th scope="col">Amaterno</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <th scope="row">{{$cliente->id}}</th>
                <td>{{$cliente->nombres}}</td>
                <td>{{$cliente->apaterno}}</td>
                <td>{{$cliente->amaterno}}</td>
                <td>{{$cliente->direccion}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->correo}}</td>
                <td><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
                <td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection