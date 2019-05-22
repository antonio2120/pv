@extends('layout_principal')
@section('content')

    <h1>{{$title}}</h1>
    <form id="proveedorForm" action="regis_val.php" method="POST">
  <div class="row">
    <div class="col">
      <label for="exampleInputEmail1">Nombre</label>
      <input type="text" class="form-control" placeholder="Nombre del proveedor" id="forNombre" name="nombre" value="{{isset($proveedor) ? $proveedor->nombre : ''}}">
    </div>
  </div>
  <div class="row">
  	<div class="col">
      <label for="inputAddress">Dirección</label>
    <input type="text" class="form-control" id="forDireccion" placeholder="Dirección" name="direccion" value="{{isset($proveedor) ? $proveedor->direccion : ''}}">
    </div>
    <div class="col">
      <label for="inputCity">Ciudad</label>
      <input type="text" class="form-control" placeholder="Ciudad" id="forCiudad" name="ciudad" value="{{isset($proveedor) ? $proveedor->ciudad : ''}}">
    </div>
    
  </div>
  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="inputEmail">Correo Electrónico</label>
      <input type="email" class="form-control" id="forCorreo" placeholder="Correo" name="correo" value="{{isset($proveedor) ? $proveedor->correo : ''}}">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPhone">Teléfono</label>
      <input type="text" class="form-control" id="forTelefono" placeholder="Teléfono" name="telefono" value="{{isset($proveedor) ? $proveedor->telefono : ''}}">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Fax</label>
      <input type="text" class="form-control" placeholder="Fax" id="forFax" name="fax" value="{{isset($proveedor) ? $proveedor->fax : ''}}">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">{{$accion == 'nuevo' ? 'Alta de proveedores' : 'Guardar cambios' }}</button>
</form>

<script>
    $(document).ready(function () {
        $("#proveedorForm").validate({
            rules: {
                nombre:{
                    required: true
                },
                direccion:{
                    required: true
                },
        ciudad:{
                    required: true
                },
        correo:{
                    required: true
                },
                telefono: {
                    required: true
                },
                fax:{
                    required: true,
                }
            },
            messages: {
                nombre: {
                    required: "Ingresar Nombre del proveedor"
                },
                direccion: {
                    required: "Ingresar Direccion del proveedor"
                },
                ciudad: {
                    required: "Ingresar Ciudad del proveedor"
                },
        correo: {
                    required: "Ingresar Correo del proveedor"
                },
        telefono: {
                    required: "Ingresar Telefono del proveedor"
                },
                fax: {
                    required: "Ingresar Fax del proveedor"
                },
            },
        });
    });

        $("#proveedorForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#proveedorForm").validate());
            event.preventDefault();

            var $form = $(this);
            if(! $form.valid()) return false;

                $.ajax({
                    url: "{{ asset('proveedoresGuardar')}}",
                    method: 'POST',
                    data: {
                        nombre: $("#forNombre").val(),
                        direccion: $("#forDireccion").val(),
                        ciudad: $("#forCiudad").val(),
                        correo: $("#forCorreo").val(),
                        telefono: $("#forTelefono").val(),
                        fax: $("#forFax").val(),
                        _token: "{{ csrf_token() }}",
                        id:"{{isset($proveedor) ? $proveedor->id : ''}}",
                        accion: "{{$accion}}"
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.status == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#empleadoForm").trigger("reset");
                        } else {
                            toastr["error"](response.mensaje);
                        }
                    },
                    error: function () {
                        toastr["error"]("Error al realizar el registro");
                    },
                    complete: function () {

                    }

                })
        });
    </script>

@endsection