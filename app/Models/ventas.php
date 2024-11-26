<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;
    protected $primaryKey = 'idv';
    protected $fillable=['idv','idcli','fecha','idu','created_at','updated_at'];
}
