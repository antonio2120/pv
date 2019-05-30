
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>{{$title}}</title>

    <link rel="stylesheet" href="{{url('css/style.css')}}">

    <style>


    table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

     td,  th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.3/examples/jumbotron/jumbotron.css" rel="stylesheet">
</head>
<body>
<h1>Punto de Venta LACM</h1>
<hr>
<main role="main">


    <div class="container">
       @yield('content')

    </div> <!-- /container -->

</main>
<hr>
<footer class="container">
    <br>
    <p>&copy; Company 2017-2019</p>
</footer>

</body>
</html>
