@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
<form id="apartadosNuevo" method="POST">
        <div class="form-group">
            <label for="clientes_id">Id del cliente</label>
            <input type="text" class="form-control" id="clientes_id" name="clientes_id" placeholder="Producto">
        </div>
        <div class="form-group">
            <label for="fecha_inicio">fecha_inicio</label>
            <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="$">
        </div>
        <div class="form-group">
            <label for="fecha_fin">fecha_fin</label>
            <input type="text" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="$">
        </div>
        <div class="form-group">
            <label for="anticipo">anticipo</label>
            <input type="text" class="form-control" id="anticipo" name="anticipo" placeholder="$">
        </div>
        <div class="form-group">
            <label for="total">total</label>
            <input type="text" class="form-control" id="total" name="total" placeholder="$">
        </div>
        <div class="form-group">
            <label for="empleado_id">empleado_id</label>
            <input type="text" class="form-control" id="empleado_id" name="empleado_id" placeholder="$">
        </div>
        <button type="submit" class="btn btn-primary">Guardar nuevo producto</button>
    </form>
    <script>
        $("#apartadosNuevo").validate({
            rules: {
                clientes_id: {
                    required: true
                },
                fecha_inicio: {
                    required: true
                },
                fecha_fin: {
                    required: true
                },
                anticipo: {
                    required: true
                },
                total: {
                    required: true
                },
                empleado_id: {
                    required: true
                },
            },
            messages: {
                clientes_id: {
                    required: "Ingresar Nombre del producto"
                },
                fecha_inicio: {
                    required: "Ingresar fecha_inicio del producto"
                },
                fecha_fin: {
                    required: "Ingresar fecha_fin del producto"
                },
                anticipo: {
                    required: "Ingresar anticipo del producto"
                },
                total: {
                    required: "Ingresar total del producto"
                },
                empleado_id: {
                    required: "Ingresar empleado_id del producto"
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

        $("#apartadosNuevo").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#apartadosNuevo").validate());
            event.preventDefault();

            if( $("#apartadosNuevo").validate()) {
                $.ajax({
                    url: 'productosGuardar',
                    method: 'POST',
                    data: {
                        clientes_id: $("#clientes_id").val(),
                        fecha_inicio: $("#fecha_inicio").val(),
                        fecha_fin: $("#fecha_fin").val(),
                        anticipo: $("#anticipo").val(),
                        total: $("#total").val(),
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.resgistrado == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#apartadosNuevo").trigger("reset");
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
