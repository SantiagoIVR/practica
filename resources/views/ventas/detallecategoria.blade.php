<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){

        $("input[name=tipop]").click(function () {
            x =  $('input:radio[name=tipop]:checked').val();
            $("#idg").load('{{url('infogenero')}}'+'?tipoven='+x);
        });

        $("#idg").click(function() {
            x =  $("#idg").val();
            $("#idp").load('{{url('infopelicula')}}'+'?idge='+x);
            console.log(x);
        });

        $("#idp").click(function() {
            x =  $("#idp").val();
            a =  $('input:radio[name=tipop]:checked').val();
            $("#datospeli").load('{{url('datospeli')}}'+'?idpe='+x+'&tipov='+a);
            console.log(a);
        });
    
    });

</script>

<table>
    @if($eleccion == 1)
        <tr>
            <td>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type = 'radio' class="btn-check" value ='1' name ='tipop' id='tipop1' autocomplete="off" checked="">
                    <label class="btn btn-outline-primary" for='tipop1'>Venta</label>
                    <input type = 'radio' class="btn-check" value ='2' name ='tipop' id='tipop2' autocomplete="off" checked="">
                    <label class="btn btn-outline-primary" for='tipop2'>Renta</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>Generos:</td>
            <td>
                <select name = 'idg' class="form-select" id='idg'></select>
                <div  id = 'infogene' ></div>
            </td>
        </tr>
        <tr>
            <td>Peliculas:</td>
            <td>
                <select name='idp' class="form-select" id='idp'></select>
                <div  id = 'infopeli' ></div>
            </td>
        </tr>
        <tr>
            <td colspan= 2> 
                <div id = 'datospeli'></div>
            </td>
        </tr>
    @else
        <tr>
            <td>SKU:</td>
            <td>
                <input type='text' name='sku' id='sku'>
            </td>
        </tr>
    @endif
</table>
