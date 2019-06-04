@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="productoForm" method="POST" enctype="multipart/form-data">
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
        <div class="form-group">
            <label class="col-md-4 control-label">Imagen</label>
            <div class="col-md-6">
                @if(isset($producto) && file_exists(public_path('img/productos/'.$producto->id.'.jpg')))
                    <img src="{{url('img/productos/'.$producto->id)}}.jpg" width="200px">
                @endif
                <input type="file" id="imagen" name="imagen" accept="image/x-png,image/gif,image/jpeg">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{$accion == 'nuevo' ? 'Alta de producto' : 'Guardar cambios' }}</button>
    </form>
    <script>
        $(document).ready(function () {
            $('#productoForm').validate({
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
                    imagen:{
                        required: true
                    }
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
                    imagen:{
                        required: "Seleccionar una imagen para el producto"
                    }
                },
            });
        });
        $("#productoForm").submit(function (event ) {
           event.preventDefault();

            var form_data = new FormData();
            form_data.append('imagen', $('#imagen')[0].files[0]);
            //form_data.append('imagen', $('#imagen')[0]);
            form_data.append('_token', '{{csrf_token()}}');
            form_data.append('accion', '{{$accion}}');
            form_data.append('id', '{{isset($producto) ? $producto->id : ''}}');
            form_data.append('nombre_producto',  $('#nombre_producto').val());
            form_data.append('descripcion',  $('#descripcion').val());
            form_data.append('precio',  $('#precio').val());
            form_data.append('costo',  $('#costo').val());
            form_data.append('proveedor',  $('#proveedor').val());
            form_data.append('categoria',  $('#categoria').val());

            var form = $('#productoForm');

            console.log(form_data);
            console.log(form);

            if(! form.valid()) return false;

            $.ajax({
                url: "{{ asset('productosGuardar')}}",
                method: 'POST',
                cache: false,// no almacenar nada en memoria cache
                contentType: false,
                processData: false,
                data: form_data,
                dataType: 'json',
                beforeSend: function () {

                },
                success: function (response) {
                    if (response.status == 'ok') {
                        toastr["success"](response.mensaje);
                        if("{{$accion}}" == "nuevo"){
                            $("#productoForm").trigger("reset");
                        }else{
                            window.setTimeout("location.href = \"{{asset('/productos/')}}\"", 3000)
                        }
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
