<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelicularestas extends Model
{
    use HasFactory;
    protected $primaryKey = 'idr'; 
    protected $fillable=['idr','idp','fecha','cantidad','estado','fecha_devolucion','created_at', 'updated_at'];
}
