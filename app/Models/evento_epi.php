<?php
/*
 * Nombre del archivo: evento_epi.php
 * Descripción: modelo para la tabla evento_epi
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class evento_epi extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'evento_epi';
    protected $primaryKey = 'id_evento_epi';
    public $timestamps = false;
    protected $fillable = [
        'codigo_evento',
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
     public function scopeCodigo_evento($query,$codigo) {
        //Filtro busqueda por código de evento
        $query->where('codigo_evento',"LIKE",'%'.$codigo.'%');
    }
    public function scopeNombre_evento($query,$nombre) {
        //Filtro busqueda por nombre del evento
        $query->where('nombre_evento',"LIKE",'%'.$nombre.'%');
    }
}
