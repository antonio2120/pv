@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="empleadoForm" enctype="multipart/form-data">
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
            <label class="col-md-4 control-label">Imágen</label>
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
                    required: true
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
                imagen:{
                    required:"Seleccione un imágen"
                }
            },
        });
    });

    $("#empleadoForm").submit(function (event ) {
            event.preventDefault();

            var form_data = new FormData();
            form_data.append('imagen', $('#imagen')[0].files[0]);
            //form_data.append('imagen', $('#imagen')[0]);
            form_data.append('_token', '{{csrf_token()}}');
            form_data.append('accion', '{{$accion}}');
            form_data.append('id', '{{isset($empleado) ? $empleado->id : ''}}');
            form_data.append('nombre',  $("#forNombre").val());
            form_data.append('apellido',  $("#forApellido").val());
            form_data.append('usuario',  $("#forUsuario").val());
            form_data.append('password',  $("#forPassword").val());

            var form = $('#empleadoForm');

            console.log(form_data);
            console.log(form);


            if(! form.valid()) return false ;
            
                $.ajax({
                    url: "{{asset('empleadosGuardar')}}",
                    method: 'POST',
                    cache: false,//no almacena nada en memoria cache
                    contentType: false,
                    processData: false,
                    data: form_data,
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        if (response.status == 'ok') {
                            toastr["success"](response.mensaje);
                            if("{{$accion}}" == "nuevo"){
                                $("#empleadoForm").trigger("reset");
                            }
                            else{
                                window.setTimeout("location.href = \"{{asset('/empleados/')}}\"", 3000)
                            }
                        } else {
                            toastr["error"](response.mensaje);
                        }
                    },
                    error: function () {
                        toastr["error"]("Error al guardar cempleado");
                    },
                    complete: function () {

                    }

                })
            
        });






       /* $("#empleadoForm").submit(function (event ) {
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
        });*/
    </script>
@endsection