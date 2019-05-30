@extends('layout_principal') 
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
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Dirección</th>
      <th scope="col">Ciudad</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Fax</th>
      <th scope="col">Correo</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($proveedores as $proveedor)
    <tr id="renglon_{{$proveedor->id}}">
      <th scope="row">{{$proveedor->id}}</th>
      <td>
                    {{$proveedor->nombre}}
                   </td>
                   <td>
                       {{$proveedor->direccion}}
                   </td>
                   <td>
                       {{$proveedor->ciudad}}
                   </td>
                   <td>
                       {{$proveedor->telefono}}
                   </td>
                   <td>
                       {{$proveedor->fax}}
                   </td>
                   <td>
                       {{$proveedor->correo}}
                   </td> 
    </tr>
  </tbody>
 
   @endforeach
</table>

   </div>   
@endsection