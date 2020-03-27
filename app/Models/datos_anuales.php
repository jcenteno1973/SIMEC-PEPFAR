<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datos_anuales extends Model
{
    const CREATED_AT = 'fec_creacion';
    const UPDATED_AT = 'fec_modificado';
    
    protected $table = 'datos_anuales';
    protected $primaryKey = 'id_datos_anuales';
    public $timestamps = true;

    protected $fillable = [
        'id_laboratorios',
        'id_tipo_rrhh',
        'id_cant_servicios',
        'id_tipo_prueba',
        'id_tipo_beneficio',
        'id_hospital',
        'id_indicador',
        'id_periodo_anual',
        'id_anio',
        'id_meses',
        'cant_servi_prueba',
        'cant_personas',
        'gasto',
        'usu_creacion',
        'usu_modificado'
    ];
    
    public function get_laboratorios()
    { return $this->hasOne('App\Models\laboratorios','id_laboratorios', 'id_laboratorios'); }
    
    public function get_tipo_rrhh()
    { return $this->hasOne('App\Models\tipo_rrhh','id_tipo_rrhh', 'id_tipo_rrhh'); }
    
    public function get_cant_servicios()
    { return $this->hasOne('App\Models\cant_servicios','id_cant_servicios', 'id_cant_servicios'); }
    
    public function get_tipo_prueba()
    { return $this->hasOne('App\Models\tipo_prueba','id_tipo_prueba', 'id_tipo_prueba'); }
    
    public function get_tipo_beneficio()
    { return $this->hasOne('App\Models\tipo_beneficio','id_tipo_beneficio', 'id_tipo_beneficio'); }
    
    public function get_hospital()
    { return $this->hasOne('App\Models\hospital','id_hospital', 'id_hospital'); }

    public function get_anio()
    { return $this->hasOne('App\Models\anio','id_anio', 'id_anio'); }
    
    public function get_meses()
    { return $this->hasOne('App\Models\meses','id_meses', 'id_meses'); }
    
    public function get_periodo_anual()
    { return $this->hasOne('App\Models\periodo_anual','id_periodo_anual', 'id_periodo_anual'); }

}
