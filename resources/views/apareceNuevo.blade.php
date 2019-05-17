@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
       <form id="apareceForm" action="regis_val.php" method="POST">
  <div class="row">
    <div class="col">
            <label for="proveedor">Apartado</label>
            <select class="form-control" id="apartado" name="apartado" >
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
    </div>
    <div class="col">
      <label for="inputNombre">Código de barras</label>
    <input type="text" class="form-control" id="forNombre" placeholder="codigo barras" name="codigo">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputPhone">CantidadxPro</label>
      <input type="text" class="form-control" id="forcantidadxPro" placeholder="CantidadxPro" name="cantidadxPro">
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
  <button type="submit" class="btn btn-primary">Agregar</button>
</form>

<script>
        $("#apareceForm").validate({
            rules: {
                apartado:{
                    required: true
                },
                codigo:{
                    required: true
                },
                cantidadxPro: {
                    required: true
                },
                terminos:{
                    required: true,
                }
            },
            messages: {
                apartado: {
                    required: "Seleccionar Apartado"
                },
                codigo: {
                    required: "Ingresar Código"
                },
                cantidadxPro: {
                    required: "Ingresar Cantidad"
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

        $("#apareceForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#apareceForm").validate());
            event.preventDefault();

            if( $("#apareceForm").validate()) {
                $.ajax({
                    url: 'apareceGuardar',
                    method: 'POST',
                    data: {
                        apartado: $("#apartado").val(),
                        codigo: $("#codigo").val(),
                        cantidadxPro: $("#cantidadxPro").val(),
                        terminos: $("#terminos").val(),
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.resgistrado == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#apareceForm").trigger("reset");
                        } else {
                            toastr["error"](response.mensaje);
                        }
                    },
                    error: function () {
                        toastr["error"]("Error al guardar");
                    },
                    complete: function () {

                    }

                })
            }
        });
</script>
@endsection
