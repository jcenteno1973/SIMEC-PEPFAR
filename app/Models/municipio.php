<?php
/*
 * Nombre del archivo: municipio.php
 * Descripción: modelo para la tabla municipio
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    //
    protected $table = 'municipio';
    protected $primaryKey = 'id_municipio';
    public $timestamps = false;
    protected $fillable = [
        'nombre_municipio'
    ]; 
    public static function fnc_municipios($parametro) {
        
     return municipio::where('id_departamento','=',$parametro)
             ->get();
    }
    public function departamentos() {        
        return $this->belongsTo('departamento','id_departamento');
    }
}
