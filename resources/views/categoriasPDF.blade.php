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
            <th scope="col">Imagen</th>
            <th scope="col">Nombre</th>
            
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
            <tr id="renglon_{{$categoria->id}}">
                <th scope="row">{{$categoria->id}}</th>
                <td>
          @if(file_exists(public_path('img/categorias/'.$categoria->id.'.jpg')))
            <img src="{{url('img/categorias/'.$categoria->id)}}.jpg" width="50px">
          @endif
      </td>
                <td>{{$categoria->nombre}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h6>Numero de registros: {{$numRegistros}}</h6>

@endsection
