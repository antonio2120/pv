@extends('layout_principal')
@section('content')
    <div class="row mt-5">
        <div class="col-8">
            <h1>{{$title}}</h1>
        </div>
        <div class="col-4">
            <div class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" id="buscar" type="text" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="buscar()"><i class="fas fa-search"></i></button>
                <button class="btn btn-outline-primary my-2 my-sm-0" onclick="imprimir('{{isset($buscar) ? $buscar : null }}')" type="button"><i class="fas fa-file-pdf"></i></button>
            </div>
        </div>
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
            <th scope="col">Imagen</th>
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
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Imagen">
                        <a href="apartados-image-upload/">
                            <button type="button" class="btn btn-warning"><i class="fas fa-upload"></i></button>
                        </a>
                        <a href="apartados-remove-image/">
                            <button type="button" class="btn btn-warning"><i class="fas fa-trash-alt"></i></button>
                        </a>
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h6>Numero de registros: {{$numRegistros}}</h6>
    <script type="text/javascript">

        function buscar() {
            location.href = "{{asset('/apartados/')}}/" + $('#buscar').val();
        }

        function imprimir(buscar) {
            location.href = "{{asset('/apartadosPDF/')}}/" + buscar;
        }

        function upload(img) {
            var form_data = new FormData();
            form_data.append('file', img.files[0]);
            form_data.append('_token', '{{csrf_token()}}');
            $('#loading').css('display', 'block');
            $.ajax({
                url: "{{url('apartados-image-upload')}}",
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.fail) {
                        $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                        alert(data.errors['file']);
                    }
                    else {
                        $('#file_name').val(data);
                        $('#preview_image').attr('src', '{{asset('uploads')}}/' + data);
                    }
                    $('#loading').css('display', 'none');
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                    $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                }
            });
        }
        function removeFile() {
            if ($('#file_name').val() != '')
                if (confirm('Are you sure want to remove profile picture?')) {
                    $('#loading').css('display', 'block');
                    var form_data = new FormData();
                    form_data.append('_method', 'DELETE');
                    form_data.append('_token', '{{csrf_token()}}');
                    $.ajax({
                        url: "apartados-remove-image/" + $('#file_name').val(),
                        data: form_data,
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                            $('#file_name').val('');
                            $('#loading').css('display', 'none');
                        },
                        error: function (xhr, status, error) {
                            alert(xhr.responseText);
                        }
                    });
                }
        }

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
