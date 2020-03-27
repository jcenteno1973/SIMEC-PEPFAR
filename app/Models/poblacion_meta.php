<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class poblacion_meta extends Model
{
    protected $table = 'poblacion_meta';
    protected $primaryKey = 'id_poblacion_meta';
    public $timestamps = false;
    protected $fillable = [
        'desc_poblacion_meta'
    ];

}
