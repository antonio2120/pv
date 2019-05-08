@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
     <table border="1">
     	 <tr>
            <th>ID</th>
            <th>Nombre Categoria</th>
        </tr>
    @foreach($categorias as $categoria)
             <tr>
                   <td>
                    {{$categoria->ID}}
                   </td>
                   <td>
                       {{$categoria->Nombre Categoria}}
                   </td>
               </tr>
    @endforeach
@endsection
