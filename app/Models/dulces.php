<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dulces extends Model
{
    use HasFactory;
    protected $primaryKey = 'iddul';
    protected $fillable=['iddul','sku','nombre','marca','cantidad','precio','fotod','descripcion','activo','created_at','updated_at'];
}
