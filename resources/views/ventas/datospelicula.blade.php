<table border=1 class="table table-hover"> 
    <tr class="table-info">
        <td align ='center'>
            Fecha de renta
        </td>
        <td align ='center'>
            Fecha de entrega
        </td>
        <td align ='center'>
            Cantidad
        </td>
        <td align ='center'>
            Status
        </td>
    </tr>
    @foreach($pelir as $pr)
        <tr>
            <td align ='center'>
                {{$pr->fecha}}
            </td>
            <td align ='center'>
                {{$pr->fecha_devolucion}}
            </td>
            <td align ='center'>
                {{$pr->cantidad}}
            </td>
            @if($pr ->estado == 'E')
                <td align ='center'>
                    Entregada
                </td>
            @else
                <td align ='center'>
                    Pendiente
                </td>
            @endif
        </tr>
    @endforeach
</table>

<table border=1>
    <tr>
        <td>
            <img src = "{{asset('archivos/'.$peli->foto)}}" height =100 width=80>
        </td>
        <td>
            SKU: {{$peli->sku}}
            <br>
            Titulo: {{$peli->nombre}}
            <br>
            @if($tipov == 1)
                Precio: ${{$peli->costo}} 
            @else
                Precio: ${{$peli->costo_renta}} por semana
            @endif
            <br>
            Existencia: {{$peli->cantidad}}
            <br>
            Descripción: {{$peli->descripcion}}
        </td>
    </tr>
</table>