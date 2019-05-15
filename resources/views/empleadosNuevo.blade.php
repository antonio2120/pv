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
  </div>
  <div class="row">
    <div class="col">
      <label for="inputUsuario">Nombre de usuario</label>
      <input type="text" class="form-control" placeholder="Usuario" id="forUsuario" name="usuario">
    </div>
    <div class="form-group">
      <label for="inputPassword">Contraseña</label>
      <input type="password" class="form-control" id="forPassword" placeholder="Password" name="password">
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
  <button type="submit" class="btn btn-primary">Guardar nuevo empleado</button>
</form>

<script>
  $("#empleadoForm").validate({
          error: function(input){
            $(this).addClass('error');
          },
            rules:{

                nombre:{
                    required: true,
                    minlength : 1,
                    maxlength : 15
                },
                apellido:{
                    required: true,
                    minlength : 1,
                    maxlength : 15
                },
                usuario:{
                    required: true,
                    minlength : 1,
                    maxlength : 10
                },
                password:{
                    required: true,
                    minlength : 1,
                    maxlength : 12
                },
                terminos:{
                    required: true,
                }
            
            },
            messages:{
              
                nombre:{
                    required : "Campo obligatorio",
                    minlength : "minimo 1 caracter",
                    maxlength : "máximo 15 caracteres"
                },

                apellido:{
                    required : "Campo obligatorio",
                    minlength : "minimo 1 caracter",
                    maxlength : "máximo 15 caracteres"
                },
                usuario:{
                    required : "Campo obligatorio",
                    minlength : " minimo 1 caracter",
                    maxlength : "máximo 10 caracteres"
                },
                password:{
                    required : "Campo obligatorio",
                    minlength : " minimo 1 caracter",
                    maxlength : " maximo 12 caracteres"
                },
                terminos:{
                    required : "Campo obligatorio",
            
                }
            },
        });
</script>
@endsection