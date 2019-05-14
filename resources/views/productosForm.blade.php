@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="productoForm" method="POST">
        <div class="form-group">
            <label for="nombre_producto">Nombre</label>
            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Producto">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" placeholder="$">
        </div>
        <div class="form-group">
            <label for="costo">Costo</label>
            <input type="text" class="form-control" id="costo" name="costo" placeholder="$">
        </div>
        <div class="form-group">
            <label for="proveedor">Proveedor</label>
            <select class="form-control" id="proveedor" name="proveedor" >
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria" >
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar nuevo producto</button>
    </form>
    <script>
        $("#productoForm").validate({
            rules: {
                nombre_producto: {
                    required: true
                },
                descripcion: {
                    required: true
                },
                precio: {
                    required: true
                },
                costo: {
                    required: true
                },
                proveedor: {
                    required: true
                },
                categoria: {
                    required: true
                },
            },
            messages: {
                nombre_producto: {
                    required: "Ingresar Nombre del producto"
                },
                descripcion: {
                    required: "Ingresar Descripción del producto"
                },
                precio: {
                    required: "Ingresar Precio del producto"
                },
                costo: {
                    required: "Ingresar Costo del producto"
                },
                proveedor: {
                    required: "Seleccionar Proveedor del producto"
                },
                categoria: {
                    required: "Seleccionar Categoria del producto"
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

        $("#productoForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#productoForm").validate());
            event.preventDefault();

            if( $("#productoForm").validate()) {
                $.ajax({
                    url: 'productosGuardar',
                    method: 'POST',
                    data: {
                        nombre_producto: $("#nombre_producto").val(),
                        descripcion: $("#descripcion").val(),
                        precio: $("#precio").val(),
                        costo: $("#costo").val(),
                        proveedor: $("#proveedor").val(),
                        categoria: $("#categoria").val(),
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.resgistrado == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#productoForm").trigger("reset");
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
