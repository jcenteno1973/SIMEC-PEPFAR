<?php
/*
 * Nombre del archivo: componente.php
 * Descripción: modelo para la tabla componente
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class componente extends Model
{
    //
     use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'componente';
    protected $primaryKey = 'id_componente';
    public $timestamps = false;
    protected $fillable = [
        'codigo_componente',
        'descripcion_componente'
    ];
    
     public function indicador() {
         return $this->hasMany('indicador');
     }
      public function vigilancia_epidemiologica() {
         return $this->hasMany('vigilancia_epidemiologica');
     }
     public function scopeCodigo_componente($query,$codigo) {
        //Filtro busqueda por codigo de componente
        $query->where('codigo_componente',"LIKE",'%'.$codigo.'%');
    }
}
