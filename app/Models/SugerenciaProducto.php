<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SugerenciaProducto extends Model
{
    use HasFactory;
    protected $table = 'sugerencias_productos';

    protected $fillable = [
        'user_id',
        'nombre',
        'marca',
        'codigo_barra',
        'status',
    ];
}

