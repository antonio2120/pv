@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="FormularioVenta"  method="POST">
  <div class="row">
    <div class="col">
      <label for="exampleInputEmail1">Nombre de Empleado en turno</label>
      <select class="form-control" id="id_empleado" name="id_empleado" value="{{$venta->id_empleado}}">
        @foreach($empleados as $empleado)
          <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="row">
  	<div class="col">
      <label for="inputFecha">Fecha de la venta (AA-MM-DD)</label>
    <input type="text" class="form-control" id="Fecha" placeholder="Fecha" name="fecha" value="{{$venta->fecha}}">
    </div>
    <div class="col">
      <label for="inputHora">Hora de la venta</label>
      <input type="text" class="form-control" placeholder="Hora" id="Hora" name="hora" value="{{$venta->hora}}">
    </div>

  </div>
  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="inputTotal">Total de la venta</label>
      <input type="Total" class="form-control" id="Total" placeholder="Total" name="Total" value="{{$venta->total}}">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check" >
      <input class="form-check-input" type="checkbox" id="Terminos" name="terminos">
      <label class="form-check-label" for="gridCheck">
        Acepto que los datos son correctos
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Agregar Venta</button>
</form>

    <script>

       $("#FormularioVenta").validate({
         errorClass:'errorForm',
           rules:{
             id_empleado:{required: true},
             fecha:{required: true},
             hora:{required: true},
             Total:{required: true}
          },
           messages:{
             id_empleado:{required: "El ID de Empleado es OBLIGATORIO"},
             fecha:{required: "Introduce la FECHA de venta"},
             hora:{required: "Introduce la HORA de venta",},
             Total:{required: "El total es OBLIGATORIO",}

           }
      });
       $("#FormularioVenta").submit(function (event ) {
         console.log('submit');
         console.log('validate', $("#FormularioVenta").validate());
         event.preventDefault();

         if ($("#FormularioVenta").validate()) {
           $.ajax({
             url: 'ventasGuardar',
             method: 'POST',
             data: {
               fecha: $("#Fecha").val(),
               hora: $("#Hora").val(),
               total: $("#Total").val(),
               empleado_id: $("#id_empleado").val(),
               _token: "{{ csrf_token() }}",
             },
             dataType: 'json',
             beforeSend: function () {

             },
             success: function (response) {
               console.log("response", response);
               if (response.status == 'ok') {
                 toastr["success"](response.mensaje);
                 $("#productoForm").trigger("reset");
               } else {
                 toastr["error"](response.mensaje);
               }
             },
             error: function () {
               toastr["error"]("Error al realizar el registro");
             },
             complete: function () {

             }

           })
         }
       });

    </script>

@endsection