@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)

            <tr>
                <th scope="row">{{$categoria->id}}</th>
                <td>{{$categoria->nombre}}</td>
                <td><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
                <td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        @endforeach


        </tbody>
    </table>


    </table>

@endsection
