<?php
/*
 * Nombre del archivo: archivo_fuente.php
 * Descripción: modelo para la tabla archivo_fuente
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class archivo_fuente extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = 'archivo_fuente';
    protected $primaryKey = 'id_archivo_fuente';
    public $timestamps = false;
    protected $fillable = [
        'codigo_archivo_fuente',
        'descripcion_archivo_fuente'
    ];
    //
    public static function fnc_archivo_fuentes($parametro) {
        
     return archivo_fuente::where('id_evento_epi','=',$parametro)
             ->get();
    }
     public function eventos_epi() {        
        return $this->belongsTo('evento_epi','id_evento_epi');
    }
}