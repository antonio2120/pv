@extends('layout_principal')
@section('content')
<div class="row mt-5">
   <div class="col-8">
            <h1>{{$title}}</h1>
        </div>
    <div class="col-4">
    <div class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" id="buscar" type="text" placeholder="Buscar" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" onclick="buscar()"><i class="fas fa-search"></i></button>
    <button class="btn btn-outline-primary my-2 my-sm-0" onclick="imprimir('{{isset($buscar) ? $buscar : null }}')" type="button"><i class="fas fa-file-pdf"></i></button>
  </div>
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
                   <td>
                    <a href="proveedoresEditar/{{$proveedor->id}}"><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></a></td>
                   <td><button onclick="eliminarProveedor({{$proveedor->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>

    </tr>
  </tbody>
 
   @endforeach
</table>


   </div>   

   <script type="text/javascript">

      function buscar(){
        location.href="{{asset('/proveedores/')}}/" + $('#buscar').val();
      }

        function eliminarProveedor(proveedor_id){
            $.ajax({
                url: 'proveedoresEliminar/'+proveedor_id,
                method: 'GET',
                data:{
                },
                dataType: 'json',
                beforeSend: function () {
                    //$("#form04_submit").removeClass("d-none");

                },
                success: function (response) {
                    if(response.status == 'ok'){
                        toastr["success"](response.mensaje);
                        $("#renglon_"+proveedor_id).remove();
                    }else{
                        toastr["error"](response.mensaje);
                    }
                },
                error: function() {
                    toastr["error"]("Error, no se pudo completar la operación");
                },
                complete: function () {

                }

            })

        }
        $(document).ready(function() {

        });
    </script>
@endsection