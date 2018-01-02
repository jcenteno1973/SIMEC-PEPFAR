<?php
/*
 * Nombre del archivo: indicador.php
 * Descripción: modelo para la tabla indicador
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class indicador extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'indicador';
    protected $primaryKey = 'id_indicador';
    public $timestamps = false;
    protected $fillable = [
        'codigo_indicador',
        'descripcion_indicador',
        'multiplicador'
    ];
    public static function fnc_indicador($parametro) {
     //Devuelve los indicadores relacionados con el componente   
     return indicador::where('id_componente','=',$parametro)
             ->get();
    }
    public function scopeCodigo($query,$indicador) {
        //Filtro busqueda por codigo indicador
        $query->where('codigo_indicador',"LIKE",'%'.$indicador.'%');
    }
    public function scopeId_evento($query,$evento) {
        //Filtro busqueda por id del evento epidemiológico
        $query->where('id_evento_epi',$evento);
    }
}
