@extends('peliculas.principal')

@section('contenido')    
    <center><h1><b>Reporte de películas</b></h1></center>
    <a href="{{ route('altapelicula') }}">
        <button type="button" class="btn btn-outline-success">Alta de pelicula</button>    
    </a>
    @if (Session::has('mensaje'))
        <div>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Felicidades</strong> {{ Session::get('mensaje') }}
            </div>
        </div>
    @endif
    <table class="table table-hover" border= 1>
        <tr class="table-primary">
            <td>Foto</td>
            <td>Nombre</td>
            <td>Genero</td>
            <td>Clasificación</td>
            <td>Costo</td>
            <td>Director</td>
            <td>Opciones</td>
        </tr>
        @foreach($consulta  as $c)
            <tr class="table-light">
                <td><img src = "{{asset('archivos/'.$c->foto)}}" height =70 width=60></td>
                <td>{{$c->nompeli}}</td>
                <td>{{$c->gene}}</td>
                <td>{{$c->clasi}}</td>
                <td>{{$c->cos}}</td>
                <td>{{$c->nomdire}}</td>
                <td>
                    @php $masid = Crypt::encrypt($c->idp); @endphp
                    @if($c->activo == 'Si')
                        <a href="{{url('editapelicula')}}/{{$masid}}">
                            <button type="button" class="btn btn-outline-info">Editar</button>
                        </a>
                        @if(Session::get('sesiontipo')=='Administrador')
                            <a href="{{ url('desactivapelicula') }}/{{$masid}}">
                                <button type="button" class="btn btn-outline-warning">Desactivar</button>
                            </a>
                        @endif
                    @else
                        @if(Session::get('sesiontipo')=='Administrador')
                            <a href="{{ url('activapelicula') }}/{{$masid}}">
                                <button type="button" class="btn btn-outline-primary">Activar</button>
                            </a>
                            <a href="{{ url('eliminapelicula') }}/{{$masid}}">
                                <button type="button" class="btn btn-outline-danger">Eliminar</button>
                            </a>
                        @endif
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@stop