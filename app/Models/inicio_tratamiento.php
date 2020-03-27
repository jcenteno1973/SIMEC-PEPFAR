<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inicio_tratamiento extends Model
{
    protected $table = 'inicio_tratamiento';
    protected $primaryKey = 'id_inicio_tratamiento';
    public $timestamps = false;
    protected $fillable = [
        'descripcion_inicio_tratamiento'
    ];

}
