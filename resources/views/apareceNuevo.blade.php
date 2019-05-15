@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
       <form id="FormularioForm" action="regis_val.php" method="POST">
  <div class="row">
    <div class="col">
      <label for="inputID">#ID</label>
      <input type="text" class="form-control" placeholder="numero de ID apartado" id="forID" name="id">
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
    
  <div class="form-group">
    <div class="form-check" >
      <input class="form-check-input" type="checkbox" id="forTerminos" name="terminos">
      <label class="form-check-label" for="gridCheck">
        Acepto los términos y condiciones
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Agregar Aparece</button>
</form>
@endsection
