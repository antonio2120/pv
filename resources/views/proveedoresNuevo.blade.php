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

          error: function(input){
            $(this).addClass('error');
          },
            rules:{

                nombre:{
                    required: true,
                    minlength : 1,
                    maxlength : 20
                },
                direccion:{
                    required: true,
                    minlength : 1,
                    maxlength : 30
                },
                ciudad:{
                    required: true,
                    minlength : 1,
                    maxlength : 30
                },
                correo:{
                    required: true,
               
                },
                telefono:{
                    required: true,
                    minlength : 1,
                    maxlength : 30
                },
                fax:{
                    required: true,
                    minlength : 1,
                    maxlength : 30
                },
                terminos:{
                    required: true,
              
                }
            },
            messages:{
                nombre:{
                    required : "Este campo es obligatorio",
                    minlength : "minimo de 1 caracter",
                    maxlength : "maximo de 20 caracteres"
                },

                direccion:{
                    required : "Este campo es obligatorio",
                    minlength : "minimo 1 caracter",
                    maxlength : " maximo de 30 caracteres"
                },
                ciudad:{
                    required : "Este campo es obligatorio",
                    minlength : " minimo de 1 caracter",
                    maxlength : " maximo de 15 caracteres"
                },
                telefono:{
                    required : "Este campo es obligatorio",
                    minlength : " minimo de 1 caracter",
                    maxlength : " maximo de 15 caracteres"
                },
                fax:{
                    required : "Este campo es obligatorio",
                    minlength : " minimo de 1 caracter",
                    maxlength : " maximo de 15 caracteres"
                },
                terminos:{
                    required : "Este campo es obligatorio",
            
                },

               correo:{
                    required: "Este campo es obligatorio",
                  
                }
            },
        });

    </script>

@endsection