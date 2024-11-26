<table border=1>
    <tr>
        <td>
            <img src = "{{asset('fotoclientes/'.$cliente->foto_cli)}}" height =80 width=80>
        </td>
        <td>
            Nombre: {{$cliente->nombre}}
            <br> Tipo: {{$cliente->tipo}}
        </td>
    </tr>
</table>