<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class poblacion_clave extends Model
{
    protected $table = 'poblacion_clave';
    protected $primaryKey = 'id_poblacion_clave';
    public $timestamps = false;
    protected $fillable = [
        'descripcion_poblacion_clave'
    ];

}
