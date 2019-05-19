@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="apartadoForm" method="POST">
        <div class="form-group">
            <label for="cliente">Nombre del cliente</label>
            <select class="form-control" id="cliente" name="cliente" >
                @foreach($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nombres}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_inicio">Fecha inicial</label>
            <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="##/##/####">
        </div>
        <div class="form-group">
            <label for="fecha_fin">Fecha final</label>
            <input type="text" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="##/##/####">
        </div>
        <div class="form-group">
            <label for="anticipo">Anticipo</label>
            <input type="text" class="form-control" id="anticipo" name="anticipo" placeholder="$">
        </div>
        <div class="form-group">
            <label for="Total">Total</label>
            <input type="text" class="form-control" id="Total" name="Total" placeholder="$">
        </div>
        <div class="form-group">
            <label for="empleado">empleado</label>
            <select class="form-control" id="empleado" name="empleado" >
                @foreach($empleados as $empleado)
                    <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar nuevo apartado</button>
    </form>
    <script>
        $("#apartadoForm").validate({
            rules: {
                cliente: {
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
                Total: {
                    required: true
                },
                cliente: {
                    required: true
                },
                empleado: {
                    required: true
                },
            },
            messages: {
                cliente: {
                    required: "Ingresar Nombre del producto"
                },
                fecha_inicio: {
                    required: "Ingresar Descripción del producto"
                },
                fecha_fin: {
                    required: "Ingresar fecha_fin del producto"
                },
                anticipo: {
                    required: "Ingresar anticipo del producto"
                },
                Total: {
                    required: "Ingresar total del producto"
                },
                cliente: {
                    required: "Seleccionar cliente del producto"
                },
                empleado: {
                    required: "Seleccionar empleado del producto"
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
                        cliente: $("#cliente").val(),
                        fecha_inicio: $("#fecha_inicio").val(),
                        fecha_fin: $("#fecha_fin").val(),
                        anticipo: $("#anticipo").val(),
                        total: $("#anticipo").val(),
                        cliente: $("#cliente").val(),
                        empleado: $("#empleado").val(),
                        _token: "{{ csrf_token() }}",
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.status == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#apartadoForm").trigger("reset");
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
