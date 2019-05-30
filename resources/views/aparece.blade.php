@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
      <div class="form-group">
        <div class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2"   onclick="imprimir()" type="text" placeholder="Search" aria-label="Search" id="buscar">
            <button   class="btn btn-outline-success my-2 my-sm-0"  onclick="buscar()" >Buscar</button>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">ID apartado</th>
            <th scope="col">Codigo barras</th>
            <th scope="col">CantidadxPro</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($aparece as $aparece)

            <tr id="renglon_{{$aparece->id}}">
                <th scope="row">{{$aparece->id}}</th>
                <td>{{$aparece->apartado_id}}</td>
                <td>{{$aparece->codigo_barras}}</td>
                <td>{{$aparece->cantidadxPro}}</td>

                 <td>
                    <span class="d-inline-block" 
                    tabindex="0"  
                    data-toggle="tooltip" 
                    title="Editar">
                        <a href="apareceEditar/{{$aparece->id}}">
                              <button type="button" 
                              class="btn btn-primary"><i class="fas fa-edit"></i></button>
                        </a>
                    </span>
                </td>
                <td>
                    <span class="d-inline-block" 
                    tabindex="0" 
                    data-toggle="tooltip" 
                    title="Eliminar">
                        <button onclick="eliminarAparece({{$aparece->id}})" 
                            type="button" 
                            class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </span>
                </td>
                
            </tr>
        @endforeach


        </tbody>
    </table>
    <h6>Numero de Registros: {{$numRegistros}}</h6>
    <script type="text/javascript">
        function buscar(){
            location.href="{{asset('/aparece/')}}/"+$('#buscar').val();
        }

        function eliminarAparece(aparece_id){
            $.ajax({
                url: "{{ asset('apareceEliminar/')}}/"+aparece_id,
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
                        $("#renglon_"+aparece_id).remove();
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
