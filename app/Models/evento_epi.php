<?php
/*
 * Nombre del archivo: evento_epi.php
 * Descripción: modelo para la tabla evento_epi
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class evento_epi extends Model
{
    //
    protected $table = 'evento_epi';
    protected $primaryKey = 'id_evento_epi';
    public $timestamps = false;
    protected $fillable = [
        'nombre_evento',
        'descripcion_evento'
    ];
    public static function fnc_evento($parametro) {
     return evento_epi::where('nombre_evento','=',$parametro)
             ->get();
    }
     public function archivo_fuentes() {
         return $this->hasMany('archivo_fuente');
     }
}
