<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peliculas extends Model
{
    use HasFactory;
    protected $primaryKey = 'idp'; 
    protected $fillable=['idp','nombre','clasificacion','cantidad','costo','costo_renta','fecha_estreno','duracion','calificacion','idg','idd','descripcion','foto','guion','created_at','updated_at','activo'];
}
