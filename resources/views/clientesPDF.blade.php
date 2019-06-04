@extends('layout_principal_pdf') 
@section('content') 
<div class="row mt-5">
   <div class="col-8">
            <h1>{{$title}}</h1>
        </div>
</div>
   <div class="table-responsive">
     <table class="table">
  <thead class="thead-dark">
    <tr style="text-align: center;">
        <th scope="col">#ID</th>
        <th scope="col">Imagen</th>
        <th scope="col">Nombre(s)</th>
        <th scope="col">Apaterno</th>
        <th scope="col">Amaterno</th>
        <th scope="col">Direccion</th>
        <th scope="col">Telefono</th>
        <th scope="col">Correo</th>
    </tr>
  </thead>
  <tbody>
    @foreach($clientes as $cliente)
    <tr id="renglon_{{$cliente->id}}">
      <th scope="row">{{$cliente->id}}</th>
      <td>
          @if(file_exists(public_path('img/clientes/'.$cliente->id.'.jpg')))
            <img src="{{url('img/clientes/'.$cliente->id)}}.jpg" width="50px">
          @endif
      </td>
      <td>{{$cliente->nombres}}</td>
      <td>{{$cliente->apaterno}}</td>
      <td>{{$cliente->amaterno}}</td>
      <td>{{$cliente->direccion}}</td>
      <td>{{$cliente->telefono}}</td>
      <td>{{$cliente->correo}}</td>
    </tr>
  </tbody>
 
   @endforeach
</table>
    <h6>Numero de registros: {{$numRegistros}}</h6>
   </div>   
@endsection