@extends('layout_principal')
@section('content')

  <div class="row mt-5"> 
   <div class="col-8">
     <h1>{{$title}}</h1>
    </div>
    <div class="col-4">
    <div class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" id="buscar" type="text" placeholder="Ingresar búsqueda" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" onclick="buscar()">Buscar</button>
    <button class="btn btn-outline-primary my-2 my-sm-2" onclick="imprimir('{{isset($buscar) ? $buscar : null }}')" type="button"><i class="fas fa-file-pdf"></i></button>
  </div>
</div>
</div>
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
            <th scope="col">Imágen</th>
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
                        <a href="empleadosEditar/{{$empleado->id}}">
                        <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                        </a>
                    </span>
                </td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar">
                        <button onclick="eliminarEmpleado({{$empleado->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </span>
                </td>
                 <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Imágen">
                        <a href="empleadosImagen/">
                            <button type="button" class="btn btn-warning"><i class="fas fa-upload"></i></button>
                        </a>
                        <a href="empleados-remove-image/">
                            <button type="button" class="btn btn-warning"><i class="fas fa-trash-alt"></i></button>
                        </a>
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h6>Número de registros: {{$numRegistros}}</h6>

    <script type="text/javascript">
        function buscar(){
        location.href="{{asset('/empleados/')}}/" + $('#buscar').val();
        }
        function imprimir(buscar) {
            location.href = "{{asset('/empleadosPDF/')}}/" + buscar;
        }

        function eliminarEmpleado(empleado_id){
            $.ajax({
                url: "{{asset('empleadosEliminar/')}}/"+empleado_id,
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
                        $("#renglon_"+empleado_id).remove();
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
