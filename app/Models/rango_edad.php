<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rango_edad extends Model
{
    protected $table = 'rango_edad';
    protected $primaryKey = 'id_rango_edad';
    public $timestamps = false;
    protected $fillable = [
        'descripcion_rango_edad',
        'desde',
        'hasta'
    ];

}
