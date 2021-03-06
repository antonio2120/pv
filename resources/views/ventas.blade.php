@extends('layout_principal')
@section('content')

        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand"><h1>{{$title}}</h1></a>
            <div class="form-inline">
                <input class="form-control mr-sm-2" id="busqueda" name = "busqueda"placeholder="Busqueda" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="buscarVenta()">Buscar</button>
                <button class="btn btn-outline-primary my-2 my-sm-0" onclick="imprimir('{{isset($busqueda) ? $busqueda : null }}')" type="button"><i class="fas fa-file-pdf"></i></button>
            </div>
        </nav>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Total</th>
            <th scope="col">ID del Empleado</th>
            <th scope="col">Subir Imagen</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ventas as $venta)

            <tr id="renglon_{{$venta->id}}">
                <th scope="row">{{$venta->id}}</th>
                <td>{{$venta->fecha}}</td>
                <td>{{$venta->hora}}</td>
                <td>{{$venta->total}}</td>
                <td>{{$venta->empleado_id}}</td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                            <a href="ventasEditar/{{$venta->id}}">
                                <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                            </a>

                    </span>
                </td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                            <a href="ventasEditar/{{$venta->id}}">
                                <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                            </a>

                    </span>
                </td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                            <a href="ventasEditar/{{$venta->id}}">
                                <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                            </a>

                    </span>
                </td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar">
                        <button onclick="eliminarVenta({{$venta->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </span>
                </td>
            </tr>
        @endforeach


        </tbody>
    </table>


    </table>
    <script type="text/javascript">

        function buscarVenta() {
            location.href = "{{ asset('/ventas/')}}/" + $('#busqueda').val();
        }

        function imprimir(busqueda) {
            location.href = "{{asset('/ventasPDF/')}}/" + busqueda;
        }

        function eliminarVenta(venta_id){
            $.ajax({
                url: 'ventasEliminar/'+venta_id,
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
                        $("#renglon_"+venta_id).remove();
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