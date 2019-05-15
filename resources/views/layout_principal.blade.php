
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>{{$title}}</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" crossorigin="anonymous">


    <style>
    input.error{
  border: solid 2px red;
}
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.3/examples/jumbotron/jumbotron.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">PV</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="productoMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
                <div class="dropdown-menu" aria-labelledby="productoMenu">
                    <a class="dropdown-item" href="productos/">Listar</a>
                    <a class="dropdown-item" href="productosNuevo/">Nuevo</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="proveedorMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Proveedores</a>
                <div class="dropdown-menu" aria-labelledby="proveedorMenu">
                    <a class="dropdown-item" href="proveedores/">Listar</a>
                    <a class="dropdown-item" href="proveedoresNuevo/">Nuevo</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="empleadoMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Empleados</a>
                <div class="dropdown-menu" aria-labelledby="empleadoMenu">
                    <a class="dropdown-item" href="empleados/">Listar</a>
                    <a class="dropdown-item" href="empleadosNuevo/">Nuevo</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categoriaMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
                <div class="dropdown-menu" aria-labelledby="categoriaMenu">
                    <a class="dropdown-item" href="categorias/">Listar</a>
                    <a class="dropdown-item" href="categoriasNuevo/">Nuevo</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="apartadoMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Apartados</a>
                <div class="dropdown-menu" aria-labelledby="apartadoMenu">
                    <a class="dropdown-item" href="apartados/">Listar</a>
                    <a class="dropdown-item" href="apartadosNuevo">Nuevo</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="clienteMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clientes</a>
                <div class="dropdown-menu" aria-labelledby="apartadoMenu">
                    <a class="dropdown-item" href="clientes/">Listar</a>
                    <a class="dropdown-item" href="clientesNuevo/">Nuevo</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="apartadoMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ventas</a>
                <div class="dropdown-menu" aria-labelledby="ventasMenu">
                    <a class="dropdown-item" href="ventas/">Listar</a>
                    <a class="dropdown-item" href="ventasNuevo">Nuevo</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="aparceMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aparece</a>
                <div class="dropdown-menu" aria-labelledby="apareceMenu">
                    <a class="dropdown-item" href="aparece/">Listar</a>
                    <a class="dropdown-item" href="apareceNuevo">Nuevo</a>

                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<main role="main">


    <div class="container">
       @yield('content')

    </div> <!-- /container -->

</main>

<footer class="container">
    <br>
    <p>&copy; Company 2017-2019</p>
</footer>

</body>
</html>
