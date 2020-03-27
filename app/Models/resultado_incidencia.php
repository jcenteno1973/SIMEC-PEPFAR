<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class resultado_incidencia extends Model
{
    protected $table = 'resultado_incidencia';
    protected $primaryKey = 'id_resultado_incidencia';
    public $timestamps = false;
    protected $fillable = [
        'resultado_incidencia'
    ];

}
