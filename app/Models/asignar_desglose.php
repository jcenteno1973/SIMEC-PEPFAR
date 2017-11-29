<?php
/*
 * Nombre del archivo: asignar_desglose.php
 * Descripción: modelo para la tabla asignar_desglose
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asignar_desglose extends Model
{
    protected $table = 'asignar_desglose';
    public $timestamps = false;
    
    public static function fnc_columnas($parametro) {
        
     return asignar_desglose::where('id_archivo_fuente','=',$parametro)
             ->get();
    }
    //
}
