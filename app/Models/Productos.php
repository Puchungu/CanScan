<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Componente;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'img',
        'descripcion',
        'marca',
        'codigo_barra',
    ];

    /*Relación: Un producto tiene muchos componentes*/
    public function componentes()
    {
        return $this->hasMany(Componentes::class, 'id_productos');
    }
}
