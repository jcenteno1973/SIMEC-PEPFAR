<?php
/*
 * Nombre del archivo: index_testing.php
 * Descripción: modelo para la tabla index_testing
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class index_testing extends Model
{
    const CREATED_AT = 'fec_creacion';
    const UPDATED_AT = 'fec_modificado';
    
    protected $table = 'index_testing';
    protected $primaryKey = 'id_index_testing';
    public $timestamps = true;
    protected $fillable = [
        'id_orientacion_sexual',
	'id_estado_index',
	'id_nivel_riesgo',
	'id_motivo_rechazo_index',
	'id_tipo_pareja',
	'id_motivo_rechazo_pareja',
	'id_unidad_atencion',
	'ind_id_index_testing',
	'id_sexo',
	'id_poblacion_meta',
	'id_municipio',
	'id_tipo_diagnostico',
	'id_inicio_tratamiento',
	'id_resultado_incidencia',
	'id_tipo_prueba_incidencia',
	'no_expediente',
	'no_documento',
	'nombres',
	'apellidos',
	'edad',
	'fecha_entrega',
	'fecha_abordaje',
	'pareja_referida',
	'direccion',
	'clinica_diagnostico',
	'index_testing_previa',
	'falla_virologica',
	'vih_its',
	'acepta_index_testing',
	'no_referenciadas',
	'embarazada',
	'lactancia',
	'consejeria_voluntaria',
        'caso_indice',
        'fecha_resultado_dx',
        'fecha_prueba_incidencia',
        'ref_exitosa',
        'ref_violencia',
        'id_tipo_violencia',
        'usu_creacion',
        'usu_modificado'
    ];
    
    public function telefono_principal()
    {
        return $this->hasMany('App\Models\telefono','id_index_testing', 'id_index_testing')->where('telefono.principal','=','1')->select('numero_telefono');
    }
    
    public function get_orientacion_sexual()
    {
        return $this->hasOne('App\Models\orientacion_sexual','id_orientacion_sexual', 'id_orientacion_sexual');
    }
    
    public function get_estado_index()
    {
        return $this->hasOne('App\Models\estado_index','id_estado_index', 'id_estado_index');
    }
    
    public function get_nivel_riesgo()
    {
        return $this->hasOne('App\Models\nivel_riesgo','id_nivel_riesgo', 'id_nivel_riesgo');
    } 
    
    public function get_motivo_rechazo_index()
    {
        return $this->hasOne('App\Models\motivo_rechazo_index','id_motivo_rechazo_index', 'id_motivo_rechazo_index');
    } 
    
    public function get_tipo_pareja()
    {
        return $this->hasOne('App\Models\tipo_pareja','id_tipo_pareja', 'id_tipo_pareja');
    }
    
    public function get_motivo_rechazo_pareja()
    {
        return $this->hasOne('App\Models\motivo_rechazo_pareja','id_motivo_rechazo_pareja', 'id_motivo_rechazo_pareja');
    }
    
    public function get_unidad_atencion()
    {
        return $this->hasOne('App\Models\unidad_atencion','id_unidad_atencion', 'id_unidad_atencion');
    }
    
    public function get_sexo()
    {
        return $this->hasOne('App\Models\sexo','id_sexo', 'id_sexo');
    }
    
    public function get_poblacion_meta()
    {
        return $this->hasOne('App\Models\poblacion_meta','id_poblacion_meta', 'id_poblacion_meta');
    }
    
    public function get_municipio()
    {
        return $this->hasOne('App\Models\municipio','id_municipio', 'id_municipio');
    }
    
    public function get_tipo_diagnostico()
    {
        return $this->hasOne('App\Models\tipo_diagnostico','id_tipo_diagnostico', 'id_tipo_diagnostico');
    }
    
    public function get_inicio_tratamiento()
    {
        return $this->hasOne('App\Models\inicio_tratamiento','id_inicio_tratamiento', 'id_inicio_tratamiento');
    }
    
    public function get_resultado_incidencia()
    {
        return $this->hasOne('App\Models\resultado_incidencia','id_resultado_incidencia', 'id_resultado_incidencia');
    }

    public function get_tipo_prueba_incidencia()
    {
        return $this->hasOne('App\Models\tipo_prueba_incidencia','id_tipo_prueba_incidencia', 'id_tipo_prueba_incidencia');
    }

    public function get_departamento()
    {
        $this->get_municipio->hasOne('App\Models\departamento','id_departamento', 'id_departamento');
    }
}
