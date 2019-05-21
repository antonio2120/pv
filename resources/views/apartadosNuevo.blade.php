@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="apartadoForm" method="POST">
        <div class="form-group">
            <label for="cliente">Nombre del cliente</label>
            <select class="form-control" id="cliente" name="cliente" >
                <option value="">-------------</option>
                @foreach($clientes as $cliente)
                    @if(isset($apartado))
                        @if($apartado->cliente_id == $cliente->id )
                            <option selected value="{{$cliente->id}}" >{{$cliente->nombres}}</option>
                        @else
                            <option value="{{$cliente->id}}">{{$cliente->nombres}}</option>
                        @endif
                    @else
                        <option value="{{$cliente->id}}">{{$cliente->nombres}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_inicio">Fecha inicial</label>
            <input  type="text"
                    class="form-control"
                    id="fecha_inicio"
                    name="fecha_inicio"
                    placeholder="##/##/####"
                    value="{{isset($apartado) ? $apartado->fecha_inicio : ''}}"
            >
        </div>
        <div class="form-group">
            <label for="fecha_fin">Fecha final</label>
            <input  type="text"
                    class="form-control"
                    id="fecha_fin"
                    name="fecha_fin"
                    placeholder="##/##/####"
                    value="{{isset($apartado) ? $apartado->fecha_fin : ''}}"
            >
        </div>
        <div class="form-group">
            <label for="anticipo">Anticipo</label>
            <input  type="text"
                    class="form-control"
                    id="anticipo"
                    name="anticipo"
                    placeholder="$"
                    value="{{isset($apartado) ? $apartado->anticipo : ''}}"
            >
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input  type="text"
                    class="form-control"
                    id="total"
                    name="total"
                    placeholder="$"
                    value="{{isset($apartado) ? $apartado->total : ''}}"
            >
        </div>
        <div class="form-group">
            <label for="empleado">Empleado</label>
            <select class="form-control" id="empleado" name="empleado" >
                <option value="">-------------</option>
                @foreach($empleados as $empleado)
                    @if(isset($apartado))
                        @if($apartado->empleado_id == $empleado->id )
                            <option selected value="{{$empleado->id}}" >{{$empleado->nombre}}</option>
                        @else
                            <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
                        @endif
                    @else
                        <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{$accion == 'nuevo' ? 'Alta de apartado' : 'Guardar cambios' }}</button>
    </form>
    <script>
        $("#apartadoForm").validate({
            rules: {
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
                cliente: {
                    required: true
                },
            },
            messages: {
                fecha_inicio: {
                    required: "Ingresar fecha inicial"
                },
                fecha_fin: {
                    required: "Ingresar fecha final"
                },
                anticipo: {
                    required: "Ingresar anticipo del producto"
                },
                total: {
                    required: "Ingresar total del producto"
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

            var $form = $(this);
            if(! $form.valid()) return false;

                $.ajax({
                    url: "{{ asset('apartadosGuardar')}}",
                    method: 'POST',
                    data: {
                        cliente: $("#cliente").val(),
                        fecha_inicio: $("#fecha_inicio").val(),
                        fecha_fin: $("#fecha_fin").val(),
                        anticipo: $("#anticipo").val(),
                        total: $("#total").val(),
                        cliente: $("#cliente").val(),
                        empleado: $("#empleado").val(),
                        _token: "{{ csrf_token() }}",
                        id:"{{isset($apartado) ? $apartado->id : ''}}",
                        accion: "{{$accion}}"
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
        });
    </script>
@endsection
