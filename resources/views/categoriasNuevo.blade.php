@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
       <form id="CategoriaForm" >
  <div class="row">
    <div class="col">
      <label for="inputNombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" placeholder="Nombre de categoria" name="nombre" value="{{isset($categoria) ? $categoria->nombre: '' }}">
    </div>
    <div class="col">
      
    </div>

    
  </div>
  <div class="form-group">
     <button type="submit" class="btn btn-primary">{{$accion =='nuevo' ? 'Alta de Categoria' : 'Guardar Cambios'}}</button> 
      
    </div>
  </div
  
</form>

<script>
    $(document).ready(function (){
        $("#CategoriaForm").validate({
            rules: {
                
                nombre:{
                    required: true
                },
                
            },
            messages: {
                
                nombre: {
                    required: "Ingresar Nombre de la categoria"
                },
                
            },
            highlight: function(element) {

            },
            unhighlight: function(element) {

            },
            errorPlacement: function(error, element) {

            },
            submitHandler: function(form) {
                return true;
            }

        });
    });
        

        $("#CategoriaForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#CategoriaForm").validate());
            event.preventDefault();

            var $form = $(this);
            if(! $form.valid()) return false ;
            
                $.ajax({
                    url: "{{asset('categoriasGuardar')}}",
                    method: 'POST',
                    data: {
                        
                        nombre: $("#nombre").val(),
                        _token: "{{ csrf_token() }}",
                        id:"{{isset($categoria) ? $categoria->id: ''}}",accion: "{{$accion}}"
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.status == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#CategoriaForm").trigger("reset");
                        } else {
                            toastr["error"](response.mensaje);
                        }
                    },
                    error: function () {
                        toastr["error"]("Error al guardar categoria");
                    },
                    complete: function () {

                    }

                })
            
        });
</script>
@endsection
