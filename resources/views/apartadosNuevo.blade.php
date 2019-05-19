@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="apartadoForm" action="regis_val.php" method="POST">
  <div class="row">
    <div class="col">
      <label for="exampleInputCliente">cliente_id</label>
      <input type="text" class="form-control" placeholder="id del cliente" id="forCliente_id" name="cliente_id">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label for="inputDate">fecha_inicio</label>
    <input type="text" class="form-control" id="forDate" placeholder="fecha_inicio" name="date">
    </div>
    <div class="col">
      <label for="inputDateEnd">fecha_fin</label>
      <input type="text" class="form-control" placeholder="fecha_fin" id="forFecha_fin" name="fecha_fin">
    </div>

  </div>
  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="inputAnticipo">Anticipo</label>
      <input type="text" class="form-control" id="forAnticipo" placeholder="anticipo" name="anticipo">
    </div>
    <div class="form-group col-md-4">
      <label for="inputTotal">Total</label>
      <input type="text" class="form-control" id="forTotal" placeholder="Total" name="total">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmpleado">ID de empleado</label>
      <input type="text" class="form-control" placeholder="Id de empleado" id="forEmpleado" name="empleado">
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
  <button type="submit" class="btn btn-primary">Agregar apartado</button>
</form>
<script>
        $("#apartadoForm").validate({
            rules: {
                cliente_id:{
                    required: true
                },
                date:{
                    required: true
                },
                precio: {
                    required: true
                },
                fecha_fin:{
                    required: true
                },
                anticipo:{
                    required: true
                },
                total:{
                    required: true,
                },
                empleado:{
                    required: true,
                },
                terminos:{
                    required: true,
                }
            },
            messages: {
                cliente_id: {
                    required: "Ingresar id del cliente del proveedor"
                },
                date: {
                    required: "Ingresar fecha_inicio del proveedor"
                },
                fecha_fin: {
                    required: "Ingresar fecha_fin del proveedor"
                },
                anticipo: {
                    required: "Ingresar anticipo del proveedor"
                },
                total: {
                    required: "Ingresar Teléfono del proveedor"
                },
                empleado: {
                    required: "Ingresar empleado del proveedor"
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

        $("#apartadoForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#apartadoForm").validate());
            event.preventDefault();

            if( $("#apartadoForm").validate()) {
                $.ajax({
                    url: 'apartadosGuardar',
                    method: 'POST',
                    data: {
                        cliente_id: $("#cliente_id").val(),
                        date: $("#date").val(),
                        fecha_fin: $("#fecha_fin").val(),
                        anticipo: $("#anticipo").val(),
                        total: $("#total").val(),
                        empleado: $("#empleado").val(),
      terminos: $("#terminos").val(),
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.resgistrado == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#apartadoForm").trigger("reset");
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
