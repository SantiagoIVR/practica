<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                color: #333;
                line-height: 1.6;
            }
            .container {
                background-color: #fff;
                padding: 20px;
                margin: 20px auto;
                max-width: 600px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .header {
                background-color: #007bff;
                color: white;
                padding: 10px;
                text-align: center;
                border-radius: 8px 8px 0 0;
            }
            .content {
                padding: 20px;
            }
            .button {
                display: inline-block;
                background-color: #28a745;
                color: white;
                padding: 10px 15px;
                text-decoration: none;
                border-radius: 5px;
                margin-top: 20px;
            }
            .footer {
                margin-top: 20px;
                text-align: center;
                font-size: 12px;
                color: #777;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h2>Cambio de Contraseña</h2>
            </div>
            <center><img class="rounded" src = "{{asset('archivos/logoPeliculasRamses2.png')}}" height =300 width = 400 ></center>
            <div class="content">
                <p>Hola, <strong>{{$correo}}</strong></p>
                <p>
                    Peliculas Ramses le manda este correo para la recuperacion de su contraseña, para continuar preciones en el voton verde de abajo.
                    <br>
                    Este boton solo funcina por un determinado tiempo.
                </p>
                <a href="{{ route('reinicia',['idu'=>$encid]) }}" class="button">Click aqui</a>
            </div>

            <div class="footer">
                <p>Si no solicitaste este cambio de contraseña, por favor contacta con nuestro equipo de soporte.</p>
            </div>
        </div>
    </body>
</html>