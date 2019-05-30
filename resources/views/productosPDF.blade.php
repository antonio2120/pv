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
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Costo</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Categoría</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr id="renglon_{{$producto->id}}">
                <td scope="row">{{$producto->id}}</td>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->costo}}</td>
                <td>{{$producto->proveedor->nombre}}</td>
                <td>{{$producto->categoria->nombre}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h6>Numero de registros: {{$numRegistros}}</h6>

@endsection
