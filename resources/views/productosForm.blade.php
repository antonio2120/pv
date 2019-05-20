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
                   value="{{isset($producto) ? $producto->nombre : ''}}"
            >
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control"
                      id="descripcion"
                      name="descripcion"
                      rows="3">{{isset($producto) ? $producto->descripcion : ''}}</textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text"
                   class="form-control"
                   id="precio"
                   name="precio"
                   placeholder="$"
                   value="{{isset($producto) ? $producto->precio : ''}}"
            >
        </div>
        <div class="form-group">
            <label for="costo">Costo</label>
            <input type="text"
                   class="form-control"
                   id="costo"
                   name="costo"
                   placeholder="$"
                   value="{{isset($producto) ? $producto->costo : ''}}"
            >
        </div>
        <div class="form-group">
            <label for="proveedor">Proveedor</label>
            <select class="form-control" id="proveedor" name="proveedor" >
                <option value="">-------------</option>
                @foreach($proveedores as $proveedor)
                    @if(isset($producto))
                        @if($producto->proveedor_id == $proveedor->id )
                            <option selected value="{{$proveedor->id}}" >{{$proveedor->nombre}}</option>
                        @else
                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                        @endif
                    @else
                        <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria" >
                <option value="">-------------</option>
                @foreach($categorias as $categoria)
                    @if(isset($producto))
                        @if($producto->categoria_id == $categoria->id )
                            <option selected value="{{$categoria->id}}" >{{$categoria->nombre}}</option>
                        @else
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endif
                    @else
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endif
                @endforeach

            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{$accion == 'nuevo' ? 'Alta de producto' : 'Guardar cambios' }}</button>
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
                    url: "{{ asset('productosGuardar')}}",
                    method: 'POST',
                    data: {
                        nombre_producto: $("#nombre_producto").val(),
                        descripcion: $("#descripcion").val(),
                        precio: $("#precio").val(),
                        costo: $("#costo").val(),
                        proveedor: $("#proveedor").val(),
                        categoria: $("#categoria").val(),
                        _token: "{{ csrf_token() }}",
                        id:"{{isset($producto) ? $producto->id : ''}}",
                        accion: "{{$accion}}"
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
