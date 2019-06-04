@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="clientesForm" method="POST">
  <div class="row">
    <div class="col">
      <label for="inputNombre(s)">Nombre</label>
      <input type="text" class="form-control" placeholder="Nombre(s)" id="inputNombre" name="inputNombre"
      value="{{isset($cliente) ? $cliente->nombres : ''}}">
    </div>
  </div>
  <div class="row">
  	<div class="col">
      <label for="inputApaterno">Apellido Paterno</label>
    <input type="text" class="form-control" id="inputApaterno" placeholder="Apaterno" name="inputApaterno" value="{{isset($cliente) ? $cliente->apaterno : ''}}">
    </div>
    <div class="col">
      <label for="inputAmaterno">Apellido Materno</label>
      <input type="text" class="form-control" placeholder="Apellido Materno" id="inputAmaterno" name="inputAmaterno" value="{{isset($cliente) ? $cliente->amaterno : ''}}">
    </div>
    
  </div>
  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="inputDireccion">Direccion</label>
      <input type="text" class="form-control" id="inputDireccion" placeholder="Direccion" name="inputDireccion" value="{{isset($cliente) ? $cliente->direccion : ''}}">
    </div>
    <div class="form-group col-md-4">
      <label for="inputTelefono">Teléfono</label>
      <input type="text" class="form-control" id="inputTelefono" placeholder="Teléfono" name="inputTelefono" value="{{isset($cliente) ? $cliente->telefono : ''}}">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCorreo">Correo Electronico</label>
      <input type="email" class="form-control" placeholder="Correo" id="inputCorreo" name="inputCorreo" value="{{isset($cliente) ? $cliente->correo : ''}}">
    </div>
    <div class="form-group">
            <label class="col-md-4 control-label">Imagen</label>
            <div class="col-md-6">
                @if(isset($cliente) && file_exists(public_path('img/clientes/'.$cliente->id.'.jpg')))
                    <img src="{{url('img/clientes/'.$cliente->id)}}.jpg" width="200px">
                @endif
                <input type="file" id="imagen" name="imagen" accept="image/x-png,image/gif,image/jpeg">
            </div>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">{{$accion == 'nuevo' ? 'Guardar Cliente' : 'Guardar Cambios'}}</button>
</form>

<script>
        $(document).ready(function () {
            $("#clientesForm").validate({
                rules: {
                    inputNombre:{
                        required: true
                    },
                    inputApaterno:{
                        required: true
                    },
                    inputAmaterno:{
                        required: true
                    },
                    inputDireccion:{
                        required: true
                    },
                    inputTelefono: {
                        required: true
                    },
                    inputCorreo:{
                        required: true,
                    }
                },
                messages: {
                    inputNombre: {
                        required: "Ingresar Nombre del Cliente"
                    },
                    inputApaterno: {
                        required: "Ingresar Apellido Paterno del Cliente"
                    },
                    inputAmaterno: {
                        required: "Ingresar Apellido Materno del Cliente"
                    },
                    inputDireccion: {
                        required: "Ingresar Direccion del Cliente"
                    },
                    inputTelefono: {
                        required: "Ingresar Telefono del Cliente"
                    },
                    inputCorreo: {
                        required: "Ingresar Correo del Cliente"
                    },
                },
            });
        });

        $("#clientesForm").submit(function (event ) {
           event.preventDefault();

            var form_data = new FormData();
            form_data.append('imagen', $('#imagen')[0].files[0]);
            //form_data.append('imagen', $('#imagen')[0]);
            form_data.append('_token', '{{csrf_token()}}');
            form_data.append('accion', '{{$accion}}');
            form_data.append('id', '{{isset($cliente) ? $cliente->id : ''}}');
            form_data.append('nombres',  $("#inputNombre").val());
            form_data.append('apaterno',  $("#inputApaterno").val());
            form_data.append('amaterno',  $("#inputAmaterno").val());
            form_data.append('direccion',  $("#inputDireccion").val());
            form_data.append('telefono',  $("#inputTelefono").val());
            form_data.append('correo',  $("#inputCorreo").val());

            var form = $('#clientesForm');

            console.log(form_data);
            console.log(form);

            if(! form.valid()) return false;

            $.ajax({
                url: "{{ asset('clientesGuardar')}}",
                method: 'POST',
                cache: false,// no almacenar nada en memoria cache
                contentType: false,
                processData: false,
                data: form_data,
                dataType: 'json',
                beforeSend: function () {

                },
                success: function (response) {
                    if (response.status == 'ok') {
                        toastr["success"](response.mensaje);
                        if("{{$accion}}" == "nuevo"){
                            $("#clientesForm").trigger("reset");
                        }else{
                            window.setTimeout("location.href = \"{{asset('/clientes/')}}\"", 3000)
                        }
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










        /*$("#clientesForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#clientesForm").validate());
            event.preventDefault();

            var form_data = new FormData();
            form_data.append('imagen', $('#imagen')[0].files[0]);
            
            var $form = $('#clientesForm');

            console.log(form_data);
            console.log($form);

            if(! $form.valid()) return false;
                $.ajax({
                    url: "{{asset('clientesGuardar')}}",
                    method: 'POST',
                    data: {
                        nombres: $("#inputNombre").val(),
                        apaterno: $("#inputApaterno").val(),
                        amaterno: $("#inputAmaterno").val(),
                        direccion: $("#inputDireccion").val(),
                        telefono: $("#inputTelefono").val(),
                        correo: $("#inputCorreo").val(),
                        _token: "{{ csrf_token() }}",
                        id:"{{isset($cliente) ? $cliente->id : ''}}",
                        accion: "{{$accion}}"
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.status == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#clientesForm").trigger("reset");
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
        });*/
</script>
@endsection