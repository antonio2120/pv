@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <div class="form-group">
        <div class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" id="buscar" type="text" placeholder="Ingresar búsqueda">
            <button class="btn btn-outline-success my-2 my-sm-0" onclick="buscar()">Buscar</button>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nombre(s)</th>
            <th scope="col">Apaterno</th>
            <th scope="col">Amaterno</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr id="renglon_{{$cliente->id}}">
                <th scope="row">{{$cliente->id}}</th>
                <td>{{$cliente->nombres}}</td>
                <td>{{$cliente->apaterno}}</td>
                <td>{{$cliente->amaterno}}</td>
                <td>{{$cliente->direccion}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->correo}}</td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                        <a href="clientesEditar/{{$cliente->id}}">
                        <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                        </a>
                    </span>
                </td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar">
                        <button onclick="eliminarCliente({{$cliente->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
    <h6>Numero de Registros: {{$numRegistros}}</h6>

    <script type="text/javascript">

        function buscar(){
            location.href="{{asset('/clientes/')}}/" + $('#buscar').val();
        }

        function eliminarCliente(cliente_id){
            $.ajax({
                url: "{{asset('clientesEliminar')}}/"+cliente_id,
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
                        $("#renglon_"+cliente_id).remove();
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