<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datos extends Model
{
    const CREATED_AT = 'fec_creacion';
    const UPDATED_AT = 'fec_modificado';
    
    protected $table = 'datos';
    protected $primaryKey = 'id_datos';
    public $timestamps = true;
    protected $fillable = [
        'id_anio',
        'id_periodo',
        'id_semana',
        'id_sexo',
        'id_prueba',
        'id_poblacion_clave',
        'id_tipo_diagnostico',
        'id_inicio_tratamiento',
        'id_resultado_carga_viral',
        'id_periodo_prueba',
        'id_indicador',
        'id_rango_edad',
        'id_cascada',
        'id_unidad_atencion',
        'id_laboratorios',
        'id_resultado_incidencia',
        'id_tipo_prueba_incidencia',
        'id_rango_edad_etario',
        'id_dispensacion_tar',
        'id_embarazo_lactancia',
        'id_seguimiento_tar',
        'id_tratamiento',
        'id_tratamiento_tb',
        'id_prueba_diagnostica_tb',
        'id_cascada_cv',
        'id_meses',
        'id_hospital',
        'valor_numerador',
        'valor_denominador',
        'valor_meta',
        'usu_creacion',
        'usu_modificado'
    ];
    
    public function get_anio_semana()
    { return $this->hasOne('App\Models\anio_semana', 'id_anio_semana', 'id_semana'); }
    
    public function get_semana()
    { return $this->hasOne('App\Models\semana','id_semana', 'id_semana'); }
    
    public function get_anio()
    { return $this->hasOne('App\Models\anio','id_anio', 'id_anio'); }
    
    public function get_cascada_cv()
    { return $this->hasOne('App\Models\cascada_cv','id_cascada_cv', 'id_cascada_cv'); }
    
    public function get_cascada()
    { return $this->hasOne('App\Models\cascada','id_cascada', 'id_cascada'); }
    
    public function get_dispensacion_tar()
    { return $this->hasOne('App\Models\dispensacion_tar','id_dispensacion_tar', 'id_dispensacion_tar'); }

    public function get_embarazo_lactancia()
    { return $this->hasOne('App\Models\embarazo_lactancia','id_embarazo_lactancia', 'id_embarazo_lactancia'); }
    
    public function get_hospital()
    { return $this->hasOne('App\Models\hospital','id_hospital', 'id_hospital'); }
    
    public function get_indicador()
    { return $this->hasOne('App\Models\indicador','id_indicador', 'id_indicador'); }
    
    public function get_inicio_tratamiento()
    { return $this->hasOne('App\Models\inicio_tratamiento','id_inicio_tratamiento', 'id_inicio_tratamiento'); }
    
    public function get_laboratorios()
    { return $this->hasOne('App\Models\laboratorios','id_laboratorios', 'id_laboratorios'); }
    
    public function get_meses()
    { return $this->hasOne('App\Models\meses','id_meses', 'id_meses'); }
    
    public function get_periodo()
    { return $this->hasOne('App\Models\periodo','id_periodo', 'id_periodo'); }
    
    public function get_periodo_prueba()
    { return $this->hasOne('App\Models\periodo_prueba','id_periodo_prueba', 'id_periodo_prueba'); }    
    
    public function get_poblacion_clave()
    { return $this->hasOne('App\Models\poblacion_clave','id_poblacion_clave', 'id_poblacion_clave'); }
    
    public function get_prueba()
    { return $this->hasOne('App\Models\prueba','id_prueba', 'id_prueba'); }
    
    public function get_prueba_diagnostica_tb()
    { return $this->hasOne('App\Models\prueba_diagnostica_tb','id_prueba_diagnostica_tb', 'id_prueba_diagnostica_tb'); }

    public function get_rango_edad()
    { return $this->hasOne('App\Models\rango_edad','id_rango_edad', 'id_rango_edad'); }    
    
    public function get_rango_edad_etario()
    { return $this->hasOne('App\Models\rango_edad_etario','id_rango_edad_etario', 'id_rango_edad_etario'); }
    
    public function get_resultado_carga_viral()
    { return $this->hasOne('App\Models\resultado_carga_viral','id_resultado_carga_viral', 'id_resultado_carga_viral'); }
    
    public function get_tipo_diagnostico()
    { return $this->hasOne('App\Models\tipo_diagnostico','id_tipo_diagnostico', 'id_tipo_diagnostico'); }
    
    public function get_resultado_incidencia()
    { return $this->hasOne('App\Models\resultado_incidencia','id_resultado_incidencia', 'id_resultado_incidencia'); }    
    
    public function get_seguimiento_tar()
    { return $this->hasOne('App\Models\seguimiento_tar','id_seguimiento_tar', 'id_seguimiento_tar'); }
    
    public function get_sexo()
    { return $this->hasOne('App\Models\sexo','id_sexo', 'id_sexo'); }
    
    public function get_tipo_prueba_incidencia()
    { return $this->hasOne('App\Models\tipo_prueba_incidencia','id_tipo_prueba_incidencia', 'id_tipo_prueba_incidencia'); }
    
    public function get_tratamiento()
    { return $this->hasOne('App\Models\tratamiento','id_tratamiento', 'id_tratamiento'); }    
    
    public function get_tratamiento_tb()
    { return $this->hasOne('App\Models\tratamiento_tb','id_tratamiento_tb', 'id_tratamiento_tb'); }
    
    public function get_unidad_atencion()
    { return $this->hasOne('App\Models\unidad_atencion','id_unidad_atencion', 'id_unidad_atencion'); }
    
}
