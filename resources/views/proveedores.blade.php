<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{$title}}</title>
</head>
<body>
    <h1>{{$title}}</h1>
    <table border="1">
        <tr>
            <th>Nombre Proveedor</th>
            <th>Direección</th>
        </tr>
        @foreach($proveedores as $proveedor)
               <tr>
                   <td>
                    {{$proveedor->nombre}}
                   </td>
                   <td>
                       {{$proveedor->direccion}}
                   </td>
               </tr>
        @endforeach
    </table>
</body>
</html>