<html>
    <head>
        <link rel="icon" href="{{asset('archivos/iconoPeliculasRamses.png')}}">
        <link href="{!! asset('css/bootstrap.css') !!}" rel="stylesheet" />
        <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">  </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#guardar").click(function() {
                    $("#mensaje").load('{{url('cambiapass')}}' + '?' + $(this).closest('form').serialize());
                });
            });    
        </script>
        <center>
            <h4>Reinicio de contraseña </h4>
            <br>
            <form>
                <input type = 'hidden' name= 'idu' value = '{{$idu}}'>
                <table>
                    <tr>
                        <td>
                            <div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name = 'pass' id='pass' autocomplete="off">
                                    <label for="floatingPassword">Introduce nueva contraseña</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name = 'pass2' id= 'pass2' autocomplete="off">
                                    <label for="floatingPassword">Confirma nueva contraseña</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align ='right'>
                            <input type = 'button' class="btn btn-success" value = 'Guardar' id= 'guardar'> 
                        </td>
                    </tr>
                </table>
            </form>
            <div id = 'mensaje'>
            </div>
        </center>
    </body>
</html>