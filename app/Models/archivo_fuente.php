<?php
/*
 * Nombre del archivo: archivo_fuente.php
 * Descripción: modelo para la tabla archivo_fuente
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class archivo_fuente extends Model
{ 
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'archivo_fuente';
    protected $primaryKey = 'id_archivo_fuente';
    public $timestamps = false;
    protected $fillable = [
        'codigo_archivo_fuente',
        'descripcion_archivo_fuente'
    ];
    //
    public static function fnc_id_archivo($parametro) {
     return archivo_fuente::where('id_indicador','=',$parametro)
             ->get();
    }
    public static function fnc_archivo_fuentes($parametro) {
     return archivo_fuente::where('id_evento_epi','=',$parametro)
             ->get();
    }
    public static function fnc_archivo_fuente_c($parametro) {
     return archivo_fuente::where('codigo_archivo_fuente','=',$parametro)
             ->get();
    }
     public function eventos_epi() {        
        return $this->belongsTo('evento_epi','id_evento_epi');
    }
    public function scopeCodigo($query,$indicador) {
        //Filtro busqueda por codigo indicador
        $query->where('codigo_archivo_fuente',"LIKE",'%'.$indicador.'%');
    }
    public function scopeId_evento($query,$evento) {
        //Filtro busqueda por id del evento epidemiológico
        $query->where('id_evento_epi',$evento);
    }
}
