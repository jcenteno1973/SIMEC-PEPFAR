<?php
/* 
     * Nombre del archivo:ficha.php
     * Descripción:
     * Fecha de creación:30/11/2016
     * Creado por: KB
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ficha extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'ficha_activo_fijo';
    protected $primaryKey = 'id_ficha_activo_fijo';
    public $timestamps = false;
    protected $fillable = [        
        'responsable_bien',
        'descripcion',
        'marca_bien',
        'modelo_bien',
        'serie_bien',
        'anio_bien',
        'numero_vin_chasis',
        'umero_motor',
        'numero_equipo',
        'placa_bien',
        'inscrita_registro',
        'numero_registro_propiedad',
        'numero_factura',
        'observacion',
        'fecha_adquisicion',
        'anios_vida_util',
        'monto_adquisicion',
        'monto_anterior',
        'fin_vida_util',
        'valor_residual',
        'costo_depreciar',
        'factor_anual',
        'costo_anual_depreciacion',
        'con_depreciacion',
        'estado_ficha',
        'es_mejora',
        'es_revaluo',
        'estado_registro'       
    ];
    
    public function fnc_lista_codigo() {
        
    return $this->hasMany('App\Models\lista_codigo');   
    } 
    
    
}
