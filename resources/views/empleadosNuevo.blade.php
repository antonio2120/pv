@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="empleadoForm" action="regis_val.php" method="POST">
  <div class="row">
    <div class="col">
      <label for="inputNombre">Nombre</label>
      <input type="text" class="form-control" placeholder="Nombre del empleado" id="forNombre" name="nombre">
    </div>
    <div class="col">
      <label for="inputApellido">Apellido</label>
    <input type="text" class="form-control" id="forApellido" placeholder="Apellido" name="apellido">
    </div>
    <div class="col">
      <label for="inputUsuario">Nombre de usuario</label>
      <input type="text" class="form-control" placeholder="Usuario" id="forUsuario" name="usuario">
    </div>
    <div class="form-group">
      <label for="inputPassword">Contraseña</label>
      <input type="password" class="form-control" id="forPassword" placeholder="Password" name="password">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Guardar nuevo empleado</button>
</form>

<script>
        $("#empleadoForm").validate({
            rules: {
                nombre:{
                    required: true
                },
                apellido:{
                    required: true
                },
                usuario: {
                    required: true
                },
                password:{
                    required: true,
                }
            },
            messages: {
                nombre: {
                    required: "Ingresar Nombre del empleado"
                },
                apellido: {
                    required: "Ingresar Apellido del empleado"
                },
                usuario: {
                    required: "Ingresar Nombre de Usuario del empleado"
                },
                password: {
                    required: "Ingresar Contraseña"
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

        $("#empleadoForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#empleadoForm").validate());
            event.preventDefault();

            if( $("#empleadoForm").validate()) {
                $.ajax({
                    url: 'empleadosGuardar',
                    method: 'POST',
                    data: {
                        nombre: $("#nombre").val(),
                        apellido: $("#apellido").val(),
                        usuario: $("#usuario").val(),
                        password: $("#password").val(),
                        _token: "{{ csrf_token() }}",
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
                        toastr["error"]("Error al guardar empleado");
                    },
                    complete: function () {

                    }

                })
            }
        });
    </script>
@endsection