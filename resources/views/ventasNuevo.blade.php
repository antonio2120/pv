@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="FormularioVenta" action="regis_val.php" method="POST">
  <div class="row">
    <div class="col">
      <label for="exampleInputEmail1">ID Empleado en turno</label>
      <input type="text" class="form-control" placeholder="ID Empleado" id="forid_empleado" name="id_empleado">
    </div>
  </div>
  <div class="row">
  	<div class="col">
      <label for="inputFecha">Fecha de la venta</label>
    <input type="text" class="form-control" id="forFecha" placeholder="Fecha" name="fecha">
    </div>
    <div class="col">
      <label for="inputHora">Hora de la venta</label>
      <input type="text" class="form-control" placeholder="Hora" id="forHora" name="hora">
    </div>
    
  </div>
  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="inputTotal">Total de la venta</label>
      <input type="Total" class="form-control" id="forTotal" placeholder="Total" name="Total">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check" >
      <input class="form-check-input" type="checkbox" id="forTerminos" name="terminos">
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
      })

    </script>

@endsection