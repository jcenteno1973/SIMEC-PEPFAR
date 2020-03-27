<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class unidad_atencion extends Model
{
    protected $table = 'unidad_atencion';
    protected $primaryKey = 'id_unidad_atencion';
    public $timestamps = false;
    protected $fillable = [
        'id_hospital',
        'nombre_unidad_atencion',
        'financiamiento'
    ];

    public function get_hospital()
    {
        return $this->hasOne('App\Models\hospital','id_hospital', 'id_hospital');
    }    
    
}
