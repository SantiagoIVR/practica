<html>
    <head>
        <title>Inicio de Sesion</title>
        <link rel="icon" href="{{asset('archivos/iconoPeliculasRamses.png')}}">
        <link href="{!! asset('css/bootstrap.css') !!}" rel="stylesheet" />
        <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">  </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <center>
            <br><br>
            <h4><b>Inicio de Sesión</b></h4>
            <img class="rounded" src = "{{asset('archivos/logoLogin.png')}}" height =200 width = 200 >
            <br>
            <br>
            <form action =  "{{route('validar')}}" method= "POST">
            {{ csrf_field() }}
            <table cellpadding=5> 
                <tr>
                    <td>
                        <div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name='correo' id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Correo electronico</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" name='pasword' id="floatingPassword" placeholder="Password" autocomplete="off">
                                <label for="floatingPassword">Contraseña</label>
                            </div>
                        </div> 
                    </td>
                </tr>
                <tr>
                    <td align ='right'>
                        <input type = 'submit' class="btn btn-success" value = 'Iniciar'>
                    </td>           
                </tr>   
            </form>
                <tr><td colspan = 2>
                @if (Session::has('mensaje'))    
                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <h6 class="alert-heading">Error</h6>
                        <p class="mb-0">{{ Session::get('mensaje') }}</p>
                    </div>
                @endif
                </tr>
                <tr>
                    <td>
                        ¿Olvidaste tu contraseña?
                        <a href="{{route('newpassword')}}">Click Aqui</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Recuperar contraseña por URL 
                        <a href="{{route('newpassword2')}}">Click Aqui</a>
                    </td>
                </tr>
            <table>
    </center>

    </body>
</html>