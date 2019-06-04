@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="empleadoForm" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col">
      <label for="inputNombre">Nombre</label>
      <input type="text" 
      class="form-control" 
      placeholder="Nombre del empleado" 
      id="forNombre" 
      name="nombre"
      value="{{isset($empleado) ? $empleado->nombre : ''}}">
    </div>

    <div class="col">
      <label for="inputApellido">Apellido</label>
    <input type="text" 
    class="form-control" 
    id="forApellido" 
    placeholder="Apellido" 
    name="apellido"
    value="{{isset($empleado) ? $empleado->apellido : ''}}">
    </div>

    <div class="col">
      <label for="inputUsuario">Nombre de usuario</label>
      <input type="text" 
      class="form-control" 
      placeholder="Usuario" 
      id="forUsuario" 
      name="usuario"
      value="{{isset($empleado) ? $empleado->nombreUsuario : ''}}">
    </div>

    <div class="form-group">
      <label for="inputPassword">Contraseña</label>
      <input type="password" 
      class="form-control" 
      id="forPassword" 
      placeholder="Password" 
      name="password"
      value="{{isset($empleado) ? $empleado->password : ''}}">
    </div>
  </div>
  <div class="form-group">
            <label class="col-md-4 control-label">Imagen</label>
            <div class="col-md-6">
                @if(isset($empleado) && file_exists(public_path('img/empleados/'.$empleado->id.'.jpg')))
                    <img src="{{url('img/empleados/'.$empleado->id)}}.jpg" width="200px">
                @endif
                <input type="file" id="imagen" name="imagen" accept="image/x-png,image/gif,image/jpeg">
            </div>
  </div>
  <button type="submit" class="btn btn-primary">{{$accion == 'nuevo' ? 'Alta de empleado' : 'Guardar cambios' }}</button>
</form>

<script>
    $(document).ready(function () {
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
        });
    });

        $("#empleadoForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#empleadoForm").validate());
            event.preventDefault();

            var $form = $(this);
            if(! $form.valid()) return false;

                $.ajax({
                    url: "{{ asset('empleadosGuardar')}}",
                    method: 'POST',
                    data: {
                        nombre: $("#forNombre").val(),
                        apellido: $("#forApellido").val(),
                        usuario: $("#forUsuario").val(),
                        password: $("#forPassword").val(),
                        _token: "{{ csrf_token() }}",
                        id:"{{isset($empleado) ? $empleado->id : ''}}",
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