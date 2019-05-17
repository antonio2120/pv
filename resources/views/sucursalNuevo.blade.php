@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="FormularioForm" action="regis_val.php" method="POST">
  <div class="row">
    <div class="col">
      <label for="exampleInputEmail1">Nombre</label>
      <input type="text" class="form-control" placeholder="Nombre(s) del proveedor" id="forNombre" name="nombre">
    </div>
  </div>
  <div class="row">
  	<div class="col">
      <label for="inputAddress">Dirección</label>
    <input type="text" class="form-control" id="forDireccion" placeholder="Dirección" name="direccion">

    
  </div>
  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="inputEmail">Correo Electrónico</label>
      <input type="email" class="form-control" id="forCorreo" placeholder="Correo" name="correo">
    </div>
 
  <div class="form-group">
    <div class="form-check" >
      <input class="form-check-input" type="checkbox" id="forTerminos" name="terminos">
      <label class="form-check-label" for="gridCheck">
        Acepto los términos y condiciones
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">nueva sucursal</button>
</form>

@endsection