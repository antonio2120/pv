@extends('layout_principal')
@section('content')  
    <h1>{{$title}}</h1>
    <form id="SucursalForm" >
  <div class="row">
    <div class="col">
      <label for="inputNombre">Nombre</label>
      <input type="text" 
      class="form-control" 
      placeholder="Nombre sucursal" 
      id="forNombre"  
      name="nombre" 
      value="{{isset($sucursal) ? $sucursal->nombre : ''}}">
    </div>

    <div class="col">
      <label for="inputDireccion">Direccion</label>
    <input type="text" 
    class="form-control" 
    id="forDireccion" 
    placeholder="forDireccion" 
    name="direccion"
    value="{{isset($sucursal) ? $sucursal->direccion : ''}}">
    </div>

    <div class="col">
      <label for="inputTelefono">Telefono</label>
      <input type="text" 
      class="form-control" 
      placeholder="forTelefono" 
      id="forTelefono" 
      name="telefono"
      value="{{isset($sucursal) ? $sucursal->telefono : ''}}">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">{{$accion == 'nuevo' ? 'Alta de empleado' : 'Guardar cambios' }}</button>
</form>


    <script>
  $(document).ready(function () {
        $("#SucursalForm").validate({
            rules: {
                nombre: {
                    required: true
                },
                direccion: {
                    required: true
                },
                telefono: {
                    required: true
                },
               },
            messages: {
                nombre: {
                    required: "Ingresar Nombre de la sucursal"
                },
                direccion: {
                    required: "Ingresar Direccion de la sucursal"
                },
                telefono: {
                    required: "Ingresar Telefono de la sucursal"
                },
                
            },
        

        });

        $("#SucursalForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#SucursalForm").validate());
            event.preventDefault();

            var $form = $(this);
            if(! $form.valid()) return false;

                $.ajax({
                    url: "{{ asset('sucursalGuardar')}}",
                    method: 'POST',
                    data: {
                        nombre: $("#forNombre").val(),
                        direccion: $("#forDireccion").val(),
                        telefono: $("#forTelefono").val(),
                      
                        _token: "{{ csrf_token() }}",
                        id:"{{isset($sucursal) ? $sucursal->id : ''}}",
                        accion: "{{$accion}}"
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.status == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#SucursalForm").trigger("reset");
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
        });
    });
    </script>
@endsection