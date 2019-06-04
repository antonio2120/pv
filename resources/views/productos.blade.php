@extends('layout_principal')
@section('content')
        <div class="row mt-5">
            <div class="col-8">
                <h1>{{$title}}</h1>
            </div>
            <div class="col-4">
                <div class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="buscar" id="buscar">
                    <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" onclick="buscar()">Buscar</button>
                    <button class="btn btn-outline-primary my-2 my-sm-0" onclick="imprimir('{{isset($buscar) ? $buscar : null }}')" type="button"><i class="fas fa-file-pdf"></i></button>
                </div>
            </div>
        </div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Imagen</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Costo</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Categoría</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr id="renglon_{{$producto->id}}">
                <th scope="row">{{$producto->id}}</th>
                <td>
                    @if(file_exists(public_path('img/productos/'.$producto->id.'.jpg')))
                        <img src="{{url('img/productos/'.$producto->id)}}.jpg" width="50px">
                    @endif
                </td>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->costo}}</td>
                <td>{{$producto->proveedor->nombre}}</td>
                <td>{{$producto->categoria->nombre}}</td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                        <a href="productosEditar/{{$producto->id}}">
                            <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                        </a>
                    </span>
                </td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar">
                        <button onclick="eliminarProducto({{$producto->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h6>Numero de registros: {{$numRegistros}}</h6>
    <script type="text/javascript">

        function buscar() {
            location.href = "{{asset('/productos/')}}/" + $('#buscar').val();
        }
        function imprimir(buscar) {
            location.href = "{{asset('/productosPDF/')}}/" + buscar;
        }
        function eliminarProducto(producto_id){
            $.ajax({
                url: "{{asset('productosEliminar/')}}/"+producto_id,
                method: 'GET',
                data:{
                },
                dataType: 'json',
                beforeSend: function () {
                    //$("#form04_submit").removeClass("d-none");

                },
                success: function (response) {
                    if(response.status == 'ok'){
                        toastr["success"](response.mensaje);
                        $("#renglon_"+producto_id).remove();
                    }else{
                        toastr["error"](response.mensaje);
                    }
                },
                error: function() {
                    toastr["error"]("Error, no se pudo completar la operación");
                },
                complete: function () {

                }

            })

        }
        $(document).ready(function() {

        });
    </script>

@endsection
