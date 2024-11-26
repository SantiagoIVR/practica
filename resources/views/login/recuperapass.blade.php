<html>
    <head>
        <title>
            Recupera contraseña
        </title>
        <link href="{!! asset('css/bootstrap.css') !!}" rel="stylesheet" />
        <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">  </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#reinicia").click(function() {
                    $("#mensaje").load('{{url('validauser')}}' + '?' + $(this).closest('form').serialize()) ;
                });

                $("#otro").click(function() {
                    $("#seccioncaptcha").load('{{url('captchanuevo')}}') ;
                });
            
            });    
        </script>
        <center>
            <h4>Recuperar Contraseña</h4>
            <br>
            <h5>Introduce tu correo y te enviaremos un correo con una contraseña nueva.</h5>
            <br>
            <form id= 'formu'>
                <table>
                    <tr>
                        <td>
                            Email <input type = 'text' class="form-control" name = 'correo' id = 'correo'>
                        </td>
                    </tr>
                </table>
                <br>
                Captcha
                <br>
                <div id='seccioncaptcha'>
                    <img src = "{{asset('captchas/'.$captcha->ruta)}}"
                    height = '80' widht='80'>
                    <input type = 'button'  class="btn btn-primary"  value = 'Otro' id='otro'>
                    <br>
                    <input type = 'hidden' name='textcap' id='textcap' value = '{{$captcha->idcap}}'>
                </div>
                <br>
                <table>
                    <tr>
                        <td>
                            Teclea texto captcha<input type = 'text' class="form-control" name='captcha'>
                        </td>
                    </tr>
                </table>
                <br>
                <br>
                <input type = 'button'  class="btn btn-success"  value = 'Reinicia Password' id='reinicia'>
            </form>
            <div id = 'mensaje'>
            </div>
        </center>
    </body>
</html>