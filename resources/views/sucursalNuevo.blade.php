@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="SucursalForm" method="POST">
        <div class="form-group">
            <label for="nombre_producto">Nombre</label>
            <input type="text" class="form-control" id="forNombre" name="forNombre" placeholder="Sucursal">
        </div>
        <div class="form-group">
            <label for="descripcion">Direccion</label>
            <textarea class="form-control" id="forDireccion" name="forDireccion" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="precio">Telefono</label>
            <input type="text" class="form-control" id="forTelefono" name="forTelefono" placeholder="$">
        </div>
       
        </div>
        <button type="submit" class="btn btn-primary">Guardar nueva sucursal</button>
    </form>
    <script>


        $("#SucursalForm").validate({
            rules: {
                forNombre: {
                    required: true
                },
                forDireccion: {
                    required: true
                },
                fortelefono: {
                    required: true
                },
               },
            messages: {
                forNombre: {
                    required: "Ingresar Nombre de la sucursal"
                },
                forDireccion: {
                    required: "Ingresar Direccion de la sucursal"
                },
                fortelefono: {
                    required: "Ingresar Telefono de la sucursal"
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

        $("#SucursalForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#SucursalForm").validate());
            event.preventDefault();


            if( $("#SucursalForm").validate()) {
                $.ajax({
                    url: 'SucursalGuardar',
                    method: 'POST',
                    data: {
                        forNombre: $("#forNombre").val(),
                        forDireccion: $("#forDireccion").val(),
                        fortelefono: $("#forTelefono").val(),
                        _token: "{{ csrf_token() }}",
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.status == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#SucursalForm").trigger("reset");
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