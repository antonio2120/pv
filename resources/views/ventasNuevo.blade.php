@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="FormularioVenta"  method="POST">
  <div class="row">
    <div class="col">
      <label for="exampleInputEmail1">Nombre de Empleado en turno</label>

      <select class="form-control" id="id_empleado" name="empleado_id">
          <option value="">-----------</option>
        @foreach($empleados as $empleado)
          @if(isset($venta))
            @if($empleado->id == $venta->empleado_id )
              <option selected value="{{$empleado->id}}" >{{$empleado->nombre}}</option>
            @else
              <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
            @endif
          @else
            <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
          @endif
        @endforeach
      </select>
    </div>
  </div>
  <div class="row">
  	<div class="col">
      <label for="inputFecha">Fecha de la venta (AA-MM-DD)</label>
    <input type="text" class="form-control" id="Fecha" placeholder="Fecha" name="fecha" value="{{isset($venta) ? $venta->fecha : ''}}">
    </div>
    <div class="col">
      <label for="inputHora">Hora de la venta (HH:MM)</label>
      <input type="text" class="form-control" placeholder="Hora" id="Hora" name="hora" value="{{isset($venta) ? $venta->hora : ''}}">
    </div>

  </div>
  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="inputTotal">Total de la venta</label>
      <input type="Total" class="form-control" id="Total" placeholder="Total" name="Total" value="{{isset($venta) ? $venta->total : ''}}">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">{{$accion == 'nuevo' ? 'Alta de venta' : 'Guardar cambios de Venta' }}</button>
</form>

    <script>
      $(document).ready(function () {
        $("#FormularioVenta").validate({
          rules: {
            id_empleado: {required: true},
            fecha: {required: true},
            hora: {required: true},
            Total: {required: true}
          },
          messages: {
            id_empleado: {required: "El ID de Empleado es OBLIGATORIO"},
            fecha: {required: "Introduce la FECHA de venta"},
            hora: {required: "Introduce la HORA de venta",},
            Total: {required: "El total es OBLIGATORIO",}

          }
        });
      });
       $("#FormularioVenta").submit(function (event ) {
         console.log('submit');
         console.log('validate', $("#FormularioVenta").validate());
         event.preventDefault();

         var $form = $(this);
         if(! $form.valid()) return false;



           $.ajax({
             url: "{{ asset('ventasGuardar')}}",
             method: 'POST',
             data: {
               fecha: $("#Fecha").val(),
               hora: $("#Hora").val(),
               total: $("#Total").val(),
               empleado_id: $("#id_empleado").val(),
               _token: "{{ csrf_token() }}",
               id:"{{isset($venta) ? $venta->id : ''}}",
               accion: "{{$accion}}"
             },
             dataType: 'json',
             beforeSend: function () {

             },
             success: function (response) {
               console.log("response", response);
               if (response.status == 'ok') {
                 toastr["success"](response.mensaje);
                 $("#FormularioVenta").trigger("reset");
               } else {
                 toastr["error"](response.mensaje);
               }
             },
             error: function () {
               toastr["error"]("Error al realizar el registro XD");
             },
             complete: function () {

             }

           })

       });

    </script>

@endsection