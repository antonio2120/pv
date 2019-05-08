@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Costo</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)

            <tr>
                <th scope="row">{{$producto->id}}</th>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->costo}}</td>
                <td><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
                <td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        @endforeach


        </tbody>
    </table>


    </table>

@endsection
