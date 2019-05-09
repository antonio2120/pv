@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">ID apartado</th>
            <th scope="col">Codigo barras</th>
            <th scope="col">CantidadxPro</th>
        </tr>
        </thead>
        <tbody>
        @foreach($aparece as $aparece)

            <tr>
                <th scope="row">{{$aparece->id}}</th>
                <td>{{$aparece->apardado_id}}</td>
                <td>{{$aparece->codigo_barras}}</td>
                <td>{{$aparece->cantidadxPro}}</td>
                <td><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
                <td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        @endforeach


        </tbody>
    </table>


    </table>

@endsection
