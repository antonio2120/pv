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
            <th scope="col">ID apartado</th>
            <th scope="col">Codigo barras</th>
            <th scope="col">CantidadxPro</th>
        </tr>
        </thead>
        <tbody>
        @foreach($aparece as $aparece)

            <tr id="renglon_{{$aparece->id}}">
                <td scope="row">{{$aparece->id}}</td>
                <td>{{$aparece->apartado_id}}</td>
                <td>{{$aparece->codigo_barras}}</td>
                <td>{{$aparece->cantidadxPro}}</td>
         </tr>
        @endforeach
        </tbody>
    </table>
    <h6>Numero de Registros: {{$numRegistros}}</h6>
@endsection
