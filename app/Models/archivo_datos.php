<?php
/*
 * Nombre del archivo: archivo_datos.php
 * Descripción: modelo para la tabla archivo_datos
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class archivo_datos extends Model
{
    protected $table = 'archivo_datos';
    protected $primaryKey = 'id_archivo_datos';
    public $timestamps = false;
    protected $fillable = [
        'nombre_archivo',
        'url_documento',
        'fuente_datos',
        'fecha_datos'
    ];
    public static function fnc_archivo_datos($parametro) {
        
     return archivo_datos::where('id_archivo_datos','=',$parametro)
             ->get();
    }
     public static function fnc_archivo_fuente($parametro) {
        
     return archivo_datos::where('id_archivo_fuente','=',$parametro)
             ->get();
    }
    public function scopeId_region_sica($query,$id_region_sica) {
        
        $query->where('id_region_sica',"=",$id_region_sica);
    }
    public function scopeId_anio_notificacion($query,$id_anio_notificacion) {
        
        $query->where('id_anio_notificacion',"=",$id_anio_notificacion);
    }
    public function scopeId_archivo_fuente($query,$id_archivo_fuente) {
        
        $query->where('id_archivo_fuente',"=",$id_archivo_fuente);
    }
    //
}
