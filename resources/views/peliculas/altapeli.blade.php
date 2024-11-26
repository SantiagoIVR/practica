@extends('peliculas.principal')

@section('contenido')
    <center><h1><b>Alta de películas</b></h1></center>
    <form action = "{{route('guardapelicula')}}" method= "POST" enctype ="multipart/form-data">
        {{ csrf_field() }}
        <center><table border= 1 cellpadding=5 width=35% bgcolor=black>
            <tr>
                <td align ='right'>* Nombre:</td>
                <td>
                    <input type= 'text' class="form-control" name = 'nombre'  value="{{old('nombre')}}" placeholder ='Nombre de la pelicula'>
                    @if($errors->first('nombre'))
                        <p class="text-warning">{{$errors->first('nombre')}}</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td align ='right'> * Clasificación:</td>
                <td>
                    @if($errors->first('clasificacion'))
                        <p class="text-warning">{{$errors->first('clasificacion')}}</p>
                    @endif
                    <input type='radio' class="form-check-input" name='clasificacion' value ='AA'>AA
                    <input type='radio' class="form-check-input" name='clasificacion' value ='A'>A
                    <input type='radio' class="form-check-input" name='clasificacion' value ='B'>B
                    <input type='radio' class="form-check-input" name='clasificacion' value ='B15'>B15
                    <input type='radio' class="form-check-input" name='clasificacion' value ='C'>C
                    <input type='radio' class="form-check-input" name='clasificacion' value ='D'>D
                </td>
            </tr>
            <tr>
                <td align ='right'>* Genero:</td>
                <td>
                    <select class="form-select" name = 'idg'>
                        @foreach($todosgeneros  as $tg)
                            <option value = '{{$tg->idg}}'>{{$tg->tipo}}</option>
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
                    <input type='text' class="form-control" name='costo' value="{{old('costo')}}" placeholder = 'Ejemplo:234.55'>
                </td>
            </tr>
            <tr>
                <td align ='right'> * Director:</td>
                <td>
                    <select class="form-select" name = 'idd'>
                        @foreach($todosdirectores  as $td)
                            <option value = '{{$td->idd}}'>{{$td->nombre}}</option>
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
                        <input type= 'text' class="form-control" name = 'duracion'  value="{{old('duracion')}}" placeholder ='Ejemplo 2:30'>
                </td>
            </tr>
            <tr>
                <td align ='right'>* Fecha de estreno:</td>
                <td>
                    @if($errors->first('fecha_estreno'))
                        <p class="text-warning">{{$errors->first('fecha_estreno')}}</p>
                    @endif
                    <input type= 'date' class="form-control" name = 'fecha_estreno'  value="{{old('fecha_estreno')}}">
                </td>
            </tr>
            <tr> 
                <td align = 'right'> * Calificación:</td>
                <td>
                    @if($errors->first('calificacion'))
                        <p class="text-warning">{{$errors->first('calificacion')}}</p>
                    @endif
                    <input type='radio' class="form-check-input" name='calificacion' value ='Mala'>Mala
                    <input type='radio' class="form-check-input" name='calificacion' value ='Regular'>Regular
                    <input type='radio' class="form-check-input" name='calificacion' value ='Buena'>Buena
                </td>
            </tr>
            <tr>
                <td align = 'right'>* Descripción:</td>
                <td>
                    @if($errors->first('descripcion'))
                        <p class="text-warning">{{$errors->first('descripcion')}}</p>
                    @endif
                    <textarea class="form-control" name = 'descripcion'></textarea>
                </td>
            </tr>
            <tr>
                <td align = 'right'>* Foto:</td>
                <td>
                    @if($errors->first('foto'))
                        <p class="text-warning">{{$errors->first('foto')}}</p>
                    @endif   
                    <input type ='file' name = 'foto' class="form-control">
                </td>
            </tr>
            <tr>
                <td align = 'right'>* Guion:</td>
                <td>
                    @if($errors->first('guion'))
                        <p class="text-warning">{{$errors->first('guion')}}</p>
                    @endif   
                    <input type ='file' name = 'guion' class="form-control">
                </td>
            </tr>
            <tr>
                <td align ='right'> * Activo:</td>
                <td>
                    <input type='radio' class="form-check-input" name='activo' value ='Si' checked>Si 
                    <input type='radio' class="form-check-input"  name='activo' value ='No'>No
                </td>
            </tr>
            <tr>
                <td align= 'right' colspan = 2>
                    <input type='submit'  class="btn btn-outline-primary" name = 'Guardar' value = 'Guardar'>
                </td>
            </tr>
            <tr>
                <td align= 'right' colspan = 2>
                    <i>Los campos con  *  son obligatorios</i>
                </td>
            </tr>
        </table></center>
    </form>
@stop