@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
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


    <script>
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
              $('#preview_image').attr('src', '{{asset('')}}');
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
                $('#preview_image').attr('src', '{{asset('')}}');
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