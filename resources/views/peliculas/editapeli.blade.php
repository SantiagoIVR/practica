@extends('peliculas.principal')

@section('contenido')
    <center><h1><b>Editar película</b></h1>
    <form action = "{{route('guardacambios')}}" method= "POST" enctype ="multipart/form-data">
        {{ csrf_field() }}
        <input type='hidden' name='idp' value="{{$infopelicula->idp}}">
        <table border= 1 cellpadding=5 width=35% bgcolor=black>
            <tr>
                <td align ='right'>* Nombre:</td>
                <td>
                    @if($errors->first('nombre'))
                        <p class="text-warning">{{$errors->first('nombre')}}</p>
                    @endif
                    <input type= 'text' class="form-control" name = 'nombre'  value="{{$infopelicula->nombre}}" placeholder ='Nombre de la pelicula'>
                </td>
            </tr>
            <tr>
                <td align ='right'> * Clasificación:</td>
                <td>
                    @if($errors->first('clasificacion'))
                        <p class="text-warning">{{$errors->first('clasificacion')}}</p>
                    @endif
                    @if($infopelicula->clasificacion == 'AA')
                        <input type='radio' class="form-check-input" name='clasificacion' value ='AA' checked>AA
                        <input type='radio' class="form-check-input" name='clasificacion' value ='A'>A
                        <input type='radio' class="form-check-input" name='clasificacion' value ='B'>B
                        <input type='radio' class="form-check-input" name='clasificacion' value ='B15'>B15
                        <input type='radio' class="form-check-input" name='clasificacion' value ='C'>C
                        <input type='radio' class="form-check-input" name='clasificacion' value ='D'>D
                    @elseif($infopelicula->clasificacion == 'A')
                        <input type='radio' class="form-check-input" name='clasificacion' value ='AA'>AA
                        <input type='radio' class="form-check-input" name='clasificacion' value ='A' checked>A
                        <input type='radio' class="form-check-input" name='clasificacion' value ='B'>B
                        <input type='radio' class="form-check-input" name='clasificacion' value ='B15'>B15
                        <input type='radio' class="form-check-input" name='clasificacion' value ='C'>C
                        <input type='radio' class="form-check-input" name='clasificacion' value ='D'>D
                    @elseif($infopelicula->clasificacion == 'B')
                        <input type='radio' class="form-check-input" name='clasificacion' value ='AA'>AA
                        <input type='radio' class="form-check-input" name='clasificacion' value ='A'>A
                        <input type='radio' class="form-check-input" name='clasificacion' value ='B' checked>B
                        <input type='radio' class="form-check-input" name='clasificacion' value ='B15'>B15
                        <input type='radio' class="form-check-input" name='clasificacion' value ='C'>C
                        <input type='radio' class="form-check-input" name='clasificacion' value ='D'>D
                    @elseif($infopelicula->clasificacion == 'B15')
                        <input type='radio' class="form-check-input" name='clasificacion' value ='AA'>AA
                        <input type='radio' class="form-check-input" name='clasificacion' value ='A'>A
                        <input type='radio' class="form-check-input" name='clasificacion' value ='B'>B
                        <input type='radio' class="form-check-input" name='clasificacion' value ='B15' checked>B15
                        <input type='radio' class="form-check-input" name='clasificacion' value ='C'>C
                        <input type='radio' class="form-check-input" name='clasificacion' value ='D'>D
                    @elseif($infopelicula->clasificacion == 'C')
                        <input type='radio' class="form-check-input" name='clasificacion' value ='AA'>AA
                        <input type='radio' class="form-check-input" name='clasificacion' value ='A'>A
                        <input type='radio' class="form-check-input" name='clasificacion' value ='B'>B
                        <input type='radio' class="form-check-input" name='clasificacion' value ='B15'>B15
                        <input type='radio' class="form-check-input" name='clasificacion' value ='C' checked>C
                        <input type='radio' class="form-check-input" name='clasificacion' value ='D'>D
                    @else
                        <input type='radio' class="form-check-input" name='clasificacion' value ='AA'>AA
                        <input type='radio' class="form-check-input" name='clasificacion' value ='A'>A
                        <input type='radio' class="form-check-input" name='clasificacion' value ='B'>B
                        <input type='radio' class="form-check-input" name='clasificacion' value ='B15'>B15
                        <input type='radio' class="form-check-input" name='clasificacion' value ='C'>C
                        <input type='radio' class="form-check-input" name='clasificacion' value ='D' checked>D
                    @endif
                </td>
            </tr>
            <tr>
                <td align ='right'>* Genero:</td>
                <td>
                    <select class="form-select" name = 'idg'>
                    <option value = '{{$infopelicula->idg}}'>{{$infopelicula->nomge}}</option>
                        @foreach($generos  as $g)
                            <option value = '{{$g->idg}}'>{{$g->tipo}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td align ='right'> * Costo:</td>
                <td>
                    @if($errors->first('costo'))
                        <p class="text-warning">{{$errors->first('costo')}}</p>
                    @endif  
                    <input type='text' class="form-control" name='costo' value="{{$infopelicula->costo}}" placeholder = 'Ejemplo:234.55'>
                </td>
            </tr>
            <tr>
                <td align ='right'> * Director:</td>
                <td>
                    <select class="form-select" name = 'idd'>
                    <option value = '{{$infopelicula->idd}}'>{{$infopelicula->nomdire}}</option>
                        @foreach($directores  as $d)
                            <option value = '{{$d->idd}}'>{{$d->nombre}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td align ='right'>* Duración:</td>
                <td>
                    @if($errors->first('duracion'))
                        <p class="text-warning">{{$errors->first('duracion')}}</p>
                    @endif
                        <input type= 'text' class="form-control" name = 'duracion'  value="{{$infopelicula->duracion}}" placeholder ='Ejemplo 2:30'>
                </td>
            </tr>
            <tr>
                <td align ='right'>* Fecha de estreno:</td>
                <td>
                    @if($errors->first('fecha_estreno'))
                        <p class="text-warning">{{$errors->first('fecha_estreno')}}</p>
                    @endif
                    <input type= 'date' class="form-control" name = 'fecha_estreno'  value="{{$infopelicula->fecha_estreno}}">
                </td>
            </tr>
            <tr> 
                <td align = 'right'> * Calificación:</td>
                <td>
                    @if($errors->first('calificacion'))
                        <p class="text-warning">{{$errors->first('calificacion')}}</p>
                    @endif
                    @if($infopelicula->calificacion == 'Mala')
                        <input type='radio' class="form-check-input" name='calificacion' value ='Mala' checked>Mala
                        <input type='radio' class="form-check-input" name='calificacion' value ='Regular'>Regular
                        <input type='radio' class="form-check-input" name='calificacion' value ='Buena'>Buena
                    @elseif($infopelicula->calificacion == 'Regular')
                        <input type='radio' class="form-check-input" name='calificacion' value ='Mala'>Mala
                        <input type='radio' class="form-check-input" name='calificacion' value ='Regular' checked>Regular
                        <input type='radio' class="form-check-input" name='calificacion' value ='Buena'>Buena
                    @else
                        <input type='radio' class="form-check-input" name='calificacion' value ='Mala'>Mala
                        <input type='radio' class="form-check-input" name='calificacion' value ='Regular'>Regular
                        <input type='radio' class="form-check-input" name='calificacion' value ='Buena' checked>Buena
                    @endif
                </td>
            </tr>
            <tr>
                <td align = 'right'>* Descripción:</td>
                <td>
                    @if($errors->first('descripcion'))
                        <p class="text-warning">{{$errors->first('descripcion')}}</p>
                    @endif
                    <textarea class="form-control" name = 'descripcion'>{{$infopelicula->descripcion}}</textarea>
                </td>
            </tr>
            <tr>
                <td align = 'right'>Foto:</td>
                <td>
                    @if($errors->first('foto'))
                        <p class="text-warning">{{$errors->first('foto')}}</p>
                    @endif  
                    <a href = "{{asset('archivos/'.$infopelicula->foto)}}" target ='_blank'>
                        <img src = "{{asset('archivos/'.$infopelicula->foto)}}" height =100 width=100> 
                    </a>
                    
                    <input type ='file' name = 'foto' class="form-control">
                </td>
            </tr>
            <tr>
                <td align = 'right'> Guion:</td>
                <td>
                    @if($errors->first('guion'))
                        <p class="text-warning">{{$errors->first('guion')}}</p>
                    @endif  
                    @if($extension =='pdf' or $extension =='PDF' )
                        <a href = "{{asset('documento/'.$infopelicula->guion)}}" target ='_blank'>
                            <img src = "{{asset('archivos/pdf.PNG')}}" height =100 width=100>
                        </a>    
                    @elseif($extension =='docx' or $extension =='DOCX' )
                        <a href = "{{asset('documento/'.$infopelicula->guion)}}" target ='_blank'>
                            <img src = "{{asset('archivos/word.PNG')}}" height =100 width=100>
                        </a>
                    @else
                        <img src = "{{asset('archivos/noarchivo.PNG')}}" height =100 width=100>
                    @endif
                
                    <input type ='file' name = 'guion' class="form-control">
                </td>
            </tr>
            <tr>
                <td align = 'right'>* Activo:</td>
                <td>
                    @if($infopelicula->activo == 'Si')
                        <input type='radio' class="form-check-input" name='activo' value ='Si' checked>Si 
                        <input type='radio' class="form-check-input"  name='activo' value ='No'>No
                    @else
                        <input type='radio' class="form-check-input" name='activo' value ='Si'>Si 
                        <input type='radio' class="form-check-input"  name='activo' value ='No' checked>No
                    @endif
                </td>
            </tr>
            <tr>
                <td align= 'right' colspan = 2>
                    @if(Session::get('sesiontipo')=='Administrador')
                        <input type='submit'  class="btn btn-outline-primary" name = 'Guardar' value = 'Guardar'>
                    @endif
                </td>
            </tr>
            <tr>
                <td align= 'right' colspan = 2>
                    <i>Los campos con  *  son obligatorios</i>
                </td>
            </tr>
        </table>
    </form></center>
@stop