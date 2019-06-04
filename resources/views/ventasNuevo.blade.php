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
  <div class="form-group">
    <div style="width:350px;height: 350px; border: 1px solid whitesmoke ;text-align: center;position: relative" id="image">
      <img width="100%" height="100%" id="preview_image" src="{{asset('')}}"/>
      <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
    </div>
    <p>
      <a href="javascript:changeProfile()" style="text-decoration: none;">
        <i class="glyphicon glyphicon-edit"></i> Change
      </a>&nbsp;&nbsp;
      <a href="javascript:removeFile()" style="color: red;text-decoration: none;">
        <i class="glyphicon glyphicon-trash"></i>
        Remove
      </a>
    </p>
    <input type="file" id="file" style="display: none"/>
    <input type="hidden" id="file_name"/>
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
               imagen: $("#file").val(),
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

       //Imagenes
      function changeProfile() {
        $('#file').click();
      }
      $('#file').change(function () {
        if ($(this).val() != '') {
          upload(this);

        }
      });
      function upload(img) {
        var form_data = new FormData();
        form_data.append('file', img.files[0]);
        form_data.append('_token', '{{csrf_token()}}');
        $('#loading').css('display', 'block');
        $.ajax({
          url: "{{url('ventasNuevo')}}",
          data: form_data,
          type: 'POST',
          contentType: false,
          processData: false,
          success: function (data) {
            if (data.fail) {
              $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
              alert(data.errors['file']);
            }
            else {
              $('#file_name').val(data);
              $('#preview_image').attr('src', '{{asset('uploads')}}/' + data);
            }
            $('#loading').css('display', 'none');
          },
          error: function (xhr, status, error) {
            alert(xhr.responseText);
            $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
          }
        });
      }
      function removeFile() {
        if ($('#file_name').val() != '')
          if (confirm('Are you sure want to remove profile picture?')) {
            $('#loading').css('display', 'block');
            var form_data = new FormData();
            form_data.append('_method', 'DELETE');
            form_data.append('_token', '{{csrf_token()}}');
            $.ajax({
              url: "ventasNuevo" + $('#file_name').val(),
              data: form_data,
              type: 'POST',
              contentType: false,
              processData: false,
              success: function (data) {
                $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                $('#file_name').val('');
                $('#loading').css('display', 'none');
              },
              error: function (xhr, status, error) {
                alert(xhr.responseText);
              }
            });
          }
      }

    </script>

@endsection