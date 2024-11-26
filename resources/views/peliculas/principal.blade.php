<html>
    <head>
        <title>Películas Ramses</title>
        <link rel="icon" href="{{asset('archivos/iconoPeliculasRamses.png')}}">
        <link href="{!! asset('css/bootstrap.css') !!}" rel="stylesheet" />
        <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">  </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('inicio') }}">
                    <center><h5><b>Películas <br> Ramses</b></h5></center>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('inicio') }}"><b>Inicio</b>
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Catalogos</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('reportepelicula') }}">Películas</a>
                                <a class="dropdown-item" href="#">Proximamente</a>
                                <a class="dropdown-item" href="#">Proximamente</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Ventas</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('crearventa') }}">Crear venta</a>
                                <a class="dropdown-item" href="#">Proximamente</a>
                                <a class="dropdown-item" href="#">Proximamente</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Consultas</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('altapelicula') }}">Alta de películas</a>
                                <a class="dropdown-item" href="#">Proximamente</a>
                                <a class="dropdown-item" href="#">Proximamente</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cerrarsesion') }}">
                                Cerrar Seción
                            </a>
                        </li>
                    </ul>
                    @if (Session::has('sesionname'))
                        <div><b>BIENVENIDO/A
                            <br> {{ Session::get('sesionname')}}
                        <br>
                        {{Session::get('sesiontipo')}}</b></div>
                    @endif
                </div>
            </div>
        </nav>
        @yield('contenido')

        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Derechos reservados UPPUE</h5>
            <small>Santiago Izquierdo 2024</small>
        </a>
        </div>
    </body>
</html>