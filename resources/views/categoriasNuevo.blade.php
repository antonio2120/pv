@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
       <form id="CategoriaForm" action="regis_val.php" method="POST">
  <div class="row">
    <div class="col">
      <label for="inputID">#ID</label>
      <input type="text" class="form-control" placeholder="numero de IDcat" id="forID" name="ID">
    </div>
    <div class="col">
      <label for="inputNombre">Nombre</label>
    <input type="text" class="form-control" id="fornombre" placeholder="Nombre de categoria" name="nombre">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check" >
      <input class="form-check-input" type="checkbox" id="forterminos" name="terminos">
      <label class="form-check-label" for="gridCheck">
        Acepto los términos y condiciones
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Agregar Categoria</button>
</form>

<script>
        $("#CategoriaForm").validate({
            rules: {
                ID:{
                    required: true
                },
                nombre:{
                    required: true
                },
                terminos:{
                    required: true
                }
            },
            messages: {
                ID: {
                    required: "Ingresar id de la categoria"
                },
                nombre: {
                    required: "Ingresar Nombre d ela categoria"
                },
                terminos: {
                    required: "Campo obligatorio"
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

        $("#CategoriaForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("CategoriaForm").validate());
            event.preventDefault();

            if( $("#CategoriaForm").validate()) {
                $.ajax({
                    url: 'categoriaGuardar',
                    method: 'POST',
                    data: {
                        nombre: $("#ID").val(),
                        nombre: $("#nombre").val(),
                        terminos: $("#terminos").val(),
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.resgistrado == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#CategoriaForm").trigger("reset");
                        } else {
                            toastr["error"](response.mensaje);
                        }
                    },
                    error: function () {
                        toastr["error"]("Error al guardar categoria");
                    },
                    complete: function () {

                    }

                })
            }
        });
</script>
@endsection
