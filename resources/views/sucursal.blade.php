@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>  
            <th scope="col">#ID</th>
            <th scope="col">nombre(s)</th>
            <th scope="col">direccion</th>
            <th scope="col">telefono</th>
            <th scope="col">editar</th>
            <th scope="col">eliminar</th>
        </tr> 
        </thead>
        <tbody>
        @foreach($sucursal as $sucursal)
            <tr id="renglon_{{$sucursal->id}}">
                <th scope="row">{{$sucursal->id}}</th>
                <td>{{$sucursal->nombre}}</td>
                <td>{{$sucursal->direccion}}</td>
                <td>{{$sucursal->telefono}}</td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                        <a href="sucursalEditar/{{$sucursal->id}}">
                        <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    </span>
                </td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar">
                        <button onclick="eliminarSucursal({{$sucursal->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </span>
                </td> 
            </tr>
        @endforeach
        </tbody>
    </table>
<script type="text/javascript">

        function eliminarSucursal(sucursal_id){
            $.ajax({
                url: 'sucursalEliminar/'+sucursal_id,
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
                        $("#renglon_"+sucursal_id).remove();
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