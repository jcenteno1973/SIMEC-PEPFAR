<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_prueba_incidencia extends Model
{
    protected $table = 'tipo_prueba_incidencia';
    protected $primaryKey = 'id_tipo_prueba_incidencia';
    public $timestamps = false;
    protected $fillable = [
        'tipo_prueba_incidencia'
    ];

}
