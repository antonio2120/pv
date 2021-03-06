@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
 
<div class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="buscar" aria-label="Search" id="buscar">
            <button class="btn btn-outline-success my-2 my-sm-0" onclick="buscar()">Buscar</button>
            <button class="btn btn-outline-primary my-2 my-sm-0" onclick="imprimir('{{isset($buscar) ? $buscar : null }}')" type="button"><i class="fas fa-file-pdf"></i></button>
        </div>
<h6>Numero de sucursales: {{$numRegistros}}</h6>
<script type="text/javascript">
    
    function buscar(){
        location.href = "{{asset('/sucursal/')}}/"+ $('#buscar').val();
    }
    function imprimir(buscar) {
            location.href = "{{asset('/sucursalPDF/')}}/" + buscar;
        }
</script> 


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


            <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Imagen">
                        <a href="sucursalImagen/">
                            <button type="button" class="btn btn-warning"><i class="fas fa-upload"></i></button>
                        </a>
                        <a href="sucursal-remove-image/">
                            <button type="button" class="btn btn-warning"><i class="fas fa-trash-alt"></i></button>
                        </a>
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