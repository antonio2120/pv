@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nombre </th>
            <th scope="col">Apellido </th>
            <th scope="col">Nombre de usuario </th>
            <th scope="col">Contraseña </th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($empleados as $empleado)
            <tr id="renglon_{{$empleado->id}}">
                <th scope="row">{{$empleado->id}}</th>
                <td>{{$empleado->nombre}}</td>
                <td>{{$empleado->apellido}}</td>
                <td>{{$empleado->nombreUsuario}}</td>
                <td>{{$empleado->password}}</td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                        <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    </span>
                </td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar">
                        <button onclick="eliminarEmpleado({{$empleado->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script type="text/javascript">

        function eliminarEmpleado(empleado_id){
            $.ajax({
                url: 'empleadosEliminar/'+empleado_id,
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
