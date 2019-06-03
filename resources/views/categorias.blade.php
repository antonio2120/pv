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
            <th scope="col">Nombre</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Imagen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)

            <tr id="renglon_{{$categoria->id}}">
                <th scope="row">{{$categoria->id}}</th>

                <td>{{$categoria->nombre}}</td>
                <td>
                    <span class="d-inline-block" tabindex="0"          data-toggle="tooltip" title="Editar">
                        <a href="categoriasEditar/{{$categoria->id}}">
                              <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                          </a>
                    </span>
                </td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar">
                        <button onclick="eliminarCategoria({{$categoria->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </span>
                </td>
                <td>
                     <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Imagen">
                        <a href="categoriasImagen/">
                            <button type="button" class="btn btn-warning"><i class="fas fa-upload"></i></button>
                        </a>
                        <a href="categoriasImagen/">
                            <button type="button" class="btn btn-warning"><i class="fas fa-trash-alt"></i></button>
                        </a>
                    </span>
                </td>

            </tr>



        @endforeach


        </tbody>
    </table>

    <h6>Numero de Registros: {{$numRegistros}}</h6>

  

     <script type="text/javascript">
            function buscar(){
               location.href = "{{asset('/categorias/')}}/" + $('#buscar').val();
            }

            function imprimir(buscar){
                location.href= "{{asset('/categoriasPDF/')}}/" + buscar;
            }
        function eliminarCategoria(categoria_id){
            $.ajax({
                url: "{{asset('categoriasEliminar/')}}/"+categoria_id,
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
                        $("#renglon_"+categoria_id).remove();
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