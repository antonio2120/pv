@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
       <form id="apareceForm" >
            <div class="form-group">
                <label for="apartado">Apardato</label>
                <select class="form-control" id="apartado" name="apartado" >
                    <option value="">-------------</option>
                    @foreach($apartado as $apartado)
                        @if(isset($aparece))
                            @if($aparece->apartado_id == $apartado->id )
                                <option selected value="{{$apartado->id}}" >{{$apartado->id}}</option>
                            @else
                                <option value="{{$apartado->id}}">{{$apartado->id}}</option>
                            @endif
                        @else
                            <option value="{{$apartado->id}}">{{$apartado->id}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col">
              <label for="inputNombre">Código de barras</label>
                <input type="text" 
                class="form-control" 
                id="codigo_barras" 
                placeholder="codigo_barras" 
                name="codigo_barras" 
                value="{{isset($aparece) ? $aparece->codigo_barras : ''}}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputPhone">CantidadxPro</label>
                  <input type="text" 
                  class="form-control" 
                  id="cantidadxPro" 
                  placeholder="cantidadxPro" 
                  name="cantidadxPro" 
                  value="{{isset($aparece) ? $aparece->cantidadxPro : ''}}">
                </div>
            </div>
 
            <button type="submit" class="btn btn-primary">{{$accion == 'nuevo' ? 'Alta de aparece' : 'Guardar cambios' }}</button>
        </form>

<script>
     $(document).ready(function () {
        $('#apareceForm').validate({
            rules: {
                apartado:{
                    required: true
                },
                codigo_barras:{
                    required: true
                },
                cantidadxPro: {
                    required: true
                },
            },
            messages: {
                apartado: {
                    required: "Seleccionar Apartado"
                },
                codigo_barras: {
                    required: "Ingresar Código"
                },
                cantidadxPro: {
                    required: "Ingresar Cantidad"
                },
                
            },
            
          });

        });

        $("#apareceForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#apareceForm").validate());
            event.preventDefault();

            var $form = $(this);
            if(! $form.valid()) return false;

            $.ajax({
                url: "{{ asset('apareceGuardar')}}",
                method: 'POST',
                data: {
                    apartado: $("#apartado").val(),
                    codigo_barras: $("#codigo_barras").val(),
                    cantidadxPro: $("#cantidadxPro").val(),
                    _token: "{{ csrf_token() }}",
                    id:"{{isset($aparece) ? $aparece->id : ''}}",
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