@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
       <form id="apareceForm">
  <div class="row">
    <div class="col">
            <label for="inputApartadp">Apartado</label>
            <select class="form-control" id="forApartado" name="apartado" >
                @foreach($apartados as $apartado)
                    <option value="{{$apartado->id}}">{{$apartado->id}}</option>
                @endforeach
            </select>
    </div>
    <div class="col">
      <label for="inputNombre">Código de barras</label>
    <input type="text" class="form-control" id="forNombre" placeholder="codigo barras" name="codigo">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputPhone">CantidadxPro</label>
      <input type="text" class="form-control" id="forCantidadxPro" placeholder="CantidadxPro" name="cantidadxPro">
    </div>
  </div>
 
  <button type="submit" class="btn btn-primary">Agregar</button>
</form>

<script>
        $("#apareceForm").validate({
            rules: {
                apartado:{
                    required: true
                },
                codigo:{
                    required: true
                },
                cantidadxPro: {
                    required: true
                }
            },
            messages: {
                apartado: {
                    required: "Seleccionar Apartado"
                },
                codigo: {
                    required: "Ingresar Código"
                },
                cantidadxPro: {
                    required: "Ingresar Cantidad"
                },
                
            },
            highlight: function(element) {

            },
            unhighlight: function(element) {

            },
            errorPlacement: function(error, element) {

            },
            submitHandler: function(form) {
                return true;
            }

        });

        $("#apareceForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#apareceForm").validate());
            event.preventDefault();

            if( $("#apareceForm").validate()) {
                $.ajax({
                    url: 'apareceGuardar',
                    method: 'POST',
                    data: {
                        apartado: $("#forApartado").val(),
                        codigo: $("#forCodigo").val(),
                        cantidadxPro: $("#forCantidadxPro").val(),
                        _token: "{{ csrf_token() }}",
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.status == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#apareceForm").trigger("reset");
                        } else {
                            toastr["error"](response.mensaje);
                        }
                    },
                    error: function () {
                        toastr["error"]("Error al guardar");
                    },
                    complete: function () {

                    }

                })
            }
        });
</script>
@endsection
