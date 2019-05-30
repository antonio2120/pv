@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <div class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" id="buscar" type="text" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" onclick="buscar()">Buscar</button>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">ID cliente</th>
            <th scope="col">Fecha de inicio</th>
            <th scope="col">Fecha final</th>
            <th scope="col">Anticipo</th>
            <th scope="col">Total</th>
            <th scope="col">ID de Empleado</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($apartados as $apartado)
            <tr id="renglon_{{$apartado->id}}">
                <th scope="row">{{$apartado->id}}</th>
                <td>{{$apartado->clientes_id}}</td>
                <td>{{$apartado->fecha_inicio}}</td>
                <td>{{$apartado->fecha_fin}}</td>
                <td>{{$apartado->anticipo}}</td>
                <td>{{$apartado->total}}</td>
                <td>{{$apartado->empleados_id}}</td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                        <a href="apartadosEditar/{{$apartado->id}}">
                            <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                        </a>
                    </span>
                </td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar">
                        <button onclick="eliminarApartado({{$apartado->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script type="text/javascript">

        function eliminarApartado(apartado_id){
            $.ajax({
                url: 'apartadosEliminar/'+apartado_id,
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
                        $("#renglon_"+apartado_id).remove();
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
