@extends('layout_principal')
@section('content')

    <h1>{{$title}}</h1>
    <form id="FormularioForm" action="regis_val.php" method="POST">
  <div class="row">
    <div class="col">
      <label for="exampleInputEmail1">Nombre</label>
      <input type="text" class="form-control" placeholder="Nombre(s) del proveedor" id="forNombre" name="nombre">
    </div>
  </div>
  <div class="row">
  	<div class="col">
      <label for="inputAddress">Dirección</label>
    <input type="text" class="form-control" id="forDireccion" placeholder="Dirección" name="direccion">
    </div>
    <div class="col">
      <label for="inputCity">Ciudad</label>
      <input type="text" class="form-control" placeholder="Ciudad" id="forCiudad" name="ciudad">
    </div>
    
  </div>
  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="inputEmail">Correo Electrónico</label>
      <input type="email" class="form-control" id="forCorreo" placeholder="Correo" name="correo">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPhone">Teléfono</label>
      <input type="text" class="form-control" id="forTelefono" placeholder="Teléfono" name="telefono">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Fax</label>
      <input type="text" class="form-control" placeholder="Fax" id="forFax" name="fax">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check" >
      <input class="form-check-input" type="checkbox" id="forTerminos" name="terminos">
      <label class="form-check-label" for="gridCheck">
        Acepto los términos y condiciones
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Agregar proveedor</button>
</form>
<script>
        $("#FormularioForm").validate({
            rules: {
                nombre:{
                    required: true
                },
                direccion:{
                    required: true
                },
                precio: {
                    required: true
                },
                ciudad:{
                    required: true
                },
                correo:{
                    required: true
                },
                telefono:{
                    required: true,
                },
                fax:{
                    required: true,
                },
                terminos:{
                    required: true,
                }
            },
            messages: {
                nombre: {
                    required: "Ingresar Nombre del proveedor"
                },
                direccion: {
                    required: "Ingresar Dirección del proveedor"
                },
                ciudad: {
                    required: "Ingresar Ciudad del proveedor"
                },
                correo: {
                    required: "Ingresar Correo del proveedor"
                },
                telefono: {
                    required: "Ingresar Teléfono del proveedor"
                },
                fax: {
                    required: "Ingresar Fax del proveedor"
                },
                terminos: {
                    required: "Este campo es obligatorio"
                },
            },
            highlight: function(element) {

            },
            unhighlight: function(element) {

            },
            errorPlacement: function(error, element) {

            },
            submitHandler: function(form) {
                return true;
            }

        });

        $("#FormularioForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#FormularioForm").validate());
            event.preventDefault();

            if( $("#FormularioForm").validate()) {
                $.ajax({
                    url: 'proveedoresGuardar',
                    method: 'POST',
                    data: {
                        nombre: $("#nombre").val(),
                        direccion: $("#direccion").val(),
                        ciudad: $("#ciudad").val(),
                        correo: $("#correo").val(),
                        telefono: $("#telefono").val(),
                        fax: $("#fax").val(),
      terminos: $("#terminos").val(),
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.resgistrado == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#FormularioForm").trigger("reset");
                        } else {
                            toastr["error"](response.mensaje);
                        }
                    },
                    error: function () {
                        toastr["error"]("Error al guardar proveedor");
                    },
                    complete: function () {

                    }

                })
            }
        });
    </script>

@endsection