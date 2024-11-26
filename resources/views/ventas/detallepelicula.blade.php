@foreach($pelicula as $p)
    <option value='{{$p->idp}}'> {{$p->nombre}}</option>
@endforeach