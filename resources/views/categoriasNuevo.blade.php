@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
       <form id="FormularioForm" action="regis_val.php" method="POST">
  <div class="row">
    <div class="col">
      <label for="inputID">#ID</label>
      <input type="text" class="form-control" placeholder="numero de IDcat" id="forID" name="id">
    </div>
    <div class="col">
      <label for="inputNombre">Nombre</label>
    <input type="text" class="form-control" id="forNombre" placeholder="Nombre de categoria" name="nombre">
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
  <button type="submit" class="btn btn-primary">Agregar Categoria</button>
</form>
@endsection
