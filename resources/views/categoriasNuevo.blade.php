@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
       <form id="FormularioForm" action="regis_val.php" method="POST">
  <div class="row">
    <div class="col">
      <label for="inputID">#ID</label>
      <input type="text" class="form-control" placeholder="numero de IDcat" id="forID" name="id">
    </div>
    <div class="col">
      <label for="inputNombre">Nombre</label>
    <input type="text" class="form-control" id="forNombre" placeholder="Nombre de categoria" name="nombre">
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
  <button type="submit" class="btn btn-primary">Agregar Categoria</button>
</form>

<script>
  $("#FormularioForm").validate({
          error: function(input){
            $(this).addClass('error');
          },
            rules:{

                id:{
                    required: true,
                    minlength : 1,
                    maxlength : 15
                },
                nombre:{
                    required: true,
                    minlength : 3,
                    maxlength : 15
                },
                terminos:{
                    required: true,
                }
            
            },
            messages:{

                id:{
                    required : "Campo obligatorio",
                    minlength : "Minimo 1 caracteres",
                    maxlength : "Máximo 15 caracteres"
                },

                nombre:{
                    required : "Campo obligatorio",
                    minlength : "Minimo 3 caracteres",
                    maxlength : "Máximo 15 caracteres"
                },
                terminos:{
                    required : "Campo obligatorio",
            
                }
            },
        });
</script>
@endsection
