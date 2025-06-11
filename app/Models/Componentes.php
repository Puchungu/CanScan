<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productos;

class Componentes extends Model
{
     use HasFactory;

    protected $table = 'componentes';

    protected $fillable = [
        'id_productos',
        'nombre',
        'descripcion',
    ];

    /* Relación: Un componente pertenece a un producto*/
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_productos');
    }
}
