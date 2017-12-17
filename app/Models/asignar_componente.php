<?php
/*
 * Nombre del archivo: asignar_componente.php
 * Descripción: modelo para la tabla asignar_componente
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asignar_componente extends Model
{
   protected $table = 'asignar_componente';
   public $timestamps = false;
   protected $fillable = [
        'fila_archivo_fuente'
    ];
    public static function fnc_fila($parametro) {
     return asignar_componente::where('id_archivo_fuente','=',$parametro)
             ->get();
    }
    //
}
