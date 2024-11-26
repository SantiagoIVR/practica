<html>
    <head>
        <link rel="icon" href="{{asset('archivos/iconoPeliculasRamses.png')}}">
        <link href="{!! asset('css/bootstrap.css') !!}" rel="stylesheet" />
        <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">  </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#enviar").click(function() {
                    $("#mensaje").load('{{url('validauser2')}}' + '?' + $(this).closest('form').serialize()) ;
                });
            });   
        </script>
        <center>
            <br>
            <h5>Introduce tu correo electronico</h5>
            <br>
            <form id="formu">
                <table>
                    <tr>
                        <td>
                            <div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name='correo' id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Correo electronico</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align ='right'>
                            <input type='button' class="btn btn-primary" value='Enviar' id='enviar'>
                        </td>
                    </tr>
                </table>
                <div id='mensaje'></div>
            </form>
        </center>
    </body>
</html>