<?php
/*
 * Nombre del archivo: tipo_indicador.php
 * Descripción: modelo para la tabla tipo_indicador
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_indicador extends Model
{
    //
    protected $table = 'tipo_indicador';
    protected $primaryKey = 'id_tipo_indicador';
    public $timestamps = false;
    protected $fillable = [
        'nombre_tipo_indicador',
        'sufijo_tipo_indicador'
    ];
}
