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
      <th scope="col">Imagen</th>
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
                   <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Imagen">
                        <a href="proveedoresImagen/">
                            <button type="button" class="btn btn-warning"><i class="fas fa-upload"></i></button>
                        </a>
                        <a href="proveedores-remove-image/">
                            <button type="button" class="btn btn-warning"><i class="fas fa-trash-alt"></i></button>
                        </a>
                    </span>
                </td>

    </tr>
  </tbody>
 
   @endforeach
</table>


   </div>   


   <script type="text/javascript">
      
      function buscar(){
        location.href = "{{asset('/proveedores/')}}/"+ $('#buscar').val();
    }
    function imprimir(buscar) {
            location.href = "{{asset('/proveedoresPDF/')}}/" + buscar;
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

        function upload(img) {
            var form_data = new FormData();
            form_data.append('file', img.files[0]);
            form_data.append('_token', '{{csrf_token()}}');
            $('#loading').css('display', 'block');
            $.ajax({
                url: "{{url('provedores-image-upload')}}",
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.fail) {
                        $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                        alert(data.errors['file']);
                    }
                    else {
                        $('#file_name').val(data);
                        $('#preview_image').attr('src', '{{asset('uploads')}}/' + data);
                    }
                    $('#loading').css('display', 'none');
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                    $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                }
            });
        }
        function removeFile() {
            if ($('#file_name').val() != '')
                if (confirm('Está seguro de querer remover la imagen?')) {
                    $('#loading').css('display', 'block');
                    var form_data = new FormData();
                    form_data.append('_method', 'DELETE');
                    form_data.append('_token', '{{csrf_token()}}');
                    $.ajax({
                        url: "proveedores-remove-image/" + $('#file_name').val(),
                        data: form_data,
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                            $('#file_name').val('');
                            $('#loading').css('display', 'none');
                        },
                        error: function (xhr, status, error) {
                            alert(xhr.responseText);
                        }
                    });
                }
        } 

        $(document).ready(function() {

        });
    </script>
@endsection