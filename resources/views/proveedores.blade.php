@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>

   <div class="table-responsive">
     <table class="table table-striped table-dark">
  <thead>
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
    <tr>
      <th scope="row">1</th>
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
                   <td><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
                   <td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
    </tr>
  </tbody>
   @endforeach
</table>
   </div>
@endsection

