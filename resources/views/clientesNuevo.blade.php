@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="clientesForm" method="POST">
  <div class="row">
    <div class="col">
      <label for="inputNombre(s)">Nombre</label>
      <input type="text" class="form-control" placeholder="Nombre(s)" id="inputNombre" name="inputNombre">
    </div>
  </div>
  <div class="row">
  	<div class="col">
      <label for="inputApaterno">Apellido Paterno</label>
    <input type="text" class="form-control" id="inputApaterno" placeholder="Apaterno" name="inputApaterno">
    </div>
    <div class="col">
      <label for="inputAmaterno">Apellido Materno</label>
      <input type="text" class="form-control" placeholder="Apellido Materno" id="inputAmaterno" name="inputAmaterno">
    </div>
    
  </div>
  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="inputDireccion">Direccion</label>
      <input type="text" class="form-control" id="inputDireccion" placeholder="Direccion" name="inputDireccion">
    </div>
    <div class="form-group col-md-4">
      <label for="inputTelefono">Teléfono</label>
      <input type="text" class="form-control" id="inputTelefono" placeholder="Teléfono" name="inputTelefono">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCorreo">Correo Electronico</label>
      <input type="email" class="form-control" placeholder="Correo" id="inputCorreo" name="inputCorreo">
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
  <button type="submit" class="btn btn-primary">Agregar cliente</button>
</form>

<script>
        $("#productoForm").validate({
            rules: {
                inputNombre: {
                    required: true
                },
                inputApaterno: {
                    required: true
                },
                inputAmaterno: {
                    required: true
                },
                inputDireccion: {
                    required: true
                },
                inputTelefono: {
                    required: true
                },
                inputCorreo: {
                    required: true
                },
            },
            messages: {
                inputNombre: {
                    required: "Ingresar Nombre del producto"
                },
                inputApaterno: {
                    required: "Ingresar Descripción del producto"
                },
                inputAmaterno: {
                    required: "Ingresar Precio del producto"
                },
                inputDireccion: {
                    required: "Ingresar Costo del producto"
                },
                inputTelefono: {
                    required: "Seleccionar Proveedor del producto"
                },
                inputCorreo: {
                    required: "Seleccionar Categoria del producto"
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

        $("#clientesForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#clientesForm").validate());
            event.preventDefault();


            if( $("#clientesForm").validate()) {
                $.ajax({
                    url: "{{asset('clientesGuardar')}}",
                    method: 'POST',
                    data: {
                        nombres: $("#inputNombre").val(),
                        apaterno: $("#inputApaterno").val(),
                        amaterno: $("#inputAmaterno").val(),
                        direccion: $("#inputDireccion").val(),
                        telefono: $("#inputTelefono").val(),
                        correo: $("#inputCorreo").val(),
                        _token: "{{ csrf_token() }}",
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.status == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#clientesForm").trigger("reset");
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
            }
        });
</script>
@endsection