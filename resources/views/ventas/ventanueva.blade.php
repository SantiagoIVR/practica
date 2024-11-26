@extends('peliculas.principal')

@section('contenido')

    <script type="text/javascript">

    $(document).ready(function(){

        $("#idcli").click(function() {
            $("#infocliente").load('{{url('infocliente')}}'+'?idcli='+this.options[this.selectedIndex].value) ;
        });

        $("input[name=tipoprod]").click(function () {
            x =  $('input:radio[name=tipoprod]:checked').val();
            $("#idprod").load('{{url('infoeleccion')}}'+'?categoria='+x);
        });
    
    });

    </script>

    <center><h2>Nueva venta</h2></center>
    <br>
    <table cellpadding=5 width=35%>
        <tr>
            <td>No de venta:</td>
            <td>
                <input type='text' name='idv' class="form-control" value='{{$iddventa}}' readonly='readonly'>
            </td>
        </tr>
        <tr>
            <td>Fecha:</td>
            <td>
                <input type = 'date' class="form-control" name = 'fecha' value = '{{$fecha}}' readonly='readonly'>
            </td>
        </tr>
        <tr>
            <td>Vendedor:</td>
            <td>
                <input type='text' class="form-control" name='vendedor' value='{{$nombreusuario}}' readonly='readonly'>
            </td>
        </tr>
        <tr>
            <td>Cliente:</td>
            <td>
                <select class="form-select" name = 'idcli' id = 'idcli'>
                    @foreach($clientes as $c)
                        <option value = '{{$c->idcli}}'> Clave: {{$c->idcli}} - {{$c->nombre}} {{$c->apellido}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td colspan= 2> 
                <div id = 'infocliente'></div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type = 'radio' class="btn-check" value ='1' name ='tipoprod' id='tipoprod1' autocomplete="off" checked="">
                    <label class="btn btn-outline-primary" for='tipoprod1'>Película</label>
                    <input type = 'radio' class="btn-check" value ='2' name ='tipoprod' id='tipoprod2' autocomplete="off" checked="">
                    <label class="btn btn-outline-primary" for='tipoprod2'>Dulces</label>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan= 2> 
                <div id = 'idprod'></div>
            </td>
        </tr>
        <tr>
            <td>Cantidad:</td>
            <td>
                <input type='number' class="form-control" name='cantidad' id='cantidad' value='0' min='0' max='100'>
            </td>
        </tr>
        <tr>
            <td>Subtotal:</td>
        </tr>
        <tr>
            <td>Descuento:</td>
            <td>
                <input type = 'radio' name = 'descuento' id='descuento' value = 'Si'>Si
                <input type = 'radio' name = 'descuento' id='descuento' value = 'No' checked>No
            </td>
        </tr>
            <td>Teclea el descuento</td>
            <td>
                <input type ='text' class="form-control" name = 'descux' id= 'descux' value = '0' disabled>
            </td>
        <tr>
            <td>Total a pagar:</td>
            <td>
                <input  type = 'text' class="form-control" name  ='total' id='total'>
            </td>
        </tr>
        <tr>
            <td>
                <button type="button" class="btn btn-danger" id='cancelar'>Cancelar</button>
            </td>
            <td>
                <button type="button" class="btn btn-primary" id='agregar' disabled>Agregar</button>
            </td>
        </tr>
    </table>
@stop
