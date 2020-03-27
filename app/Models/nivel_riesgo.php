<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nivel_riesgo extends Model
{
    protected $table = 'nivel_riesgo';
    protected $primaryKey = 'id_nivel_riesgo';
    public $timestamps = false;
    protected $fillable = [
        'desc_nivel_riesgo'
    ];

}
