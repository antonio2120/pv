@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="FormularioForm" action="regis_val.php" method="POST">
  <div class="row">
    <div class="col">
      <label for="inputNombre(s)">Nombre</label>
      <input type="text" class="form-control" placeholder="Nombre(s)" id="inputNombre" name="inputNombre">
    </div>
  </div>
  <div class="row">
  	<div class="col">
      <label for="inputApaterno">Apellido Paterno</label>
    <input type="text" class="form-control" id="inputApaterno" placeholder="Apaterno" name="inputApaterno">
    </div>
    <div class="col">
      <label for="inputAmaterno">Apellido Materno</label>
      <input type="text" class="form-control" placeholder="Apellido Materno" id="inputAmaterno" name="inputAmaterno">
    </div>
    
  </div>
  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="inputDireccion">Direccion</label>
      <input type="text" class="form-control" id="inputDireccion" placeholder="Direccion" name="inputDireccion">
    </div>
    <div class="form-group col-md-4">
      <label for="inputTelefono">Teléfono</label>
      <input type="text" class="form-control" id="inputTelefono" placeholder="Teléfono" name="inputTelefono">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCorreo">Correo Electronico</label>
      <input type="email" class="form-control" placeholder="Correo" id="inputCorreo" name="inputCorreo">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check" >
      <input class="form-check-input" type="checkbox" id="forTerminos" name="terminos">
      <label class="form-check-label" for="gridCheck">
        Acepto los términos y condiciones
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Agregar cliente</button>
</form>

@endsection