@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
       <form id="apareceForm" >
  <div class="row">
    <div class="col">
            <label for="proveedor">Apartado</label>
            <select class="form-control" id="apartado" name="apartado" >
                 @foreach($apartado as $apartado)
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
      <input type="text" class="form-control" id="forcantidadxPro" placeholder="CantidadxPro" name="cantidadxPro">
    </div>
  </div>
    
   <button type="submit" class="btn btn-primary">Guardar nuevo aparece</button>
</form>

<script>
    $(document).ready(function (){
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
                },
                terminos:{
                    required: true,
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
                terminos: {
                    required: "Campo obligatorio"
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
        

        });

        $("#apareceForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#apareceForm").validate());
            event.preventDefault();

            var $form = $(this);
            if(! $form.valid()) return false ;
                $.ajax({
                    url: "{{asset('apareceGuardar')}}",
                    method: 'POST',
                    data: {
                        id:"{{isset($aparece) ? $aparece->id: ''}}",
                        apartado: $("#apartado").val(),
                        codigo: $("#codigo").val(),
                        cantidadxPro: $("#cantidadxPro").val(),
                        terminos: $("#terminos").val(),
                        _token: "{{ csrf_token() }}",
                        accion: "{{$accion}}"
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
        });
</script>
@endsection