@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="productoForm" method="POST">
        <div class="form-group">
            <label for="nombre_producto">Nombre</label>
            <input type="text"
                   class="form-control"
                   id="nombre_producto"
                   name="nombre_producto"
                   placeholder="Producto"
                   value="{{$producto->nombre}}"
            >
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control"
                      id="descripcion"
                      name="descripcion"
                      rows="3">{{$producto->descripcion}}</textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text"
                   class="form-control"
                   id="precio"
                   name="precio"
                   placeholder="$"
                   value="{{$producto->precio}}"
            >
        </div>
        <div class="form-group">
            <label for="costo">Costo</label>
            <input type="text"
                   class="form-control"
                   id="costo"
                   name="costo"
                   placeholder="$"
                   value="{{$producto->costo}}"
            >
        </div>
        <div class="form-group">
            <label for="proveedor">Proveedor</label>
            <select class="form-control" id="proveedor" name="proveedor" >
                @foreach($proveedores as $proveedor)
                    <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria" >
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
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
                        _token: "{{ csrf_token() }}",
                        id:"{{$producto->id}}"
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.status == 'ok') {
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
