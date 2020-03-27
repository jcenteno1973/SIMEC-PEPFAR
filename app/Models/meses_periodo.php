<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class meses_periodo extends Model
{
    protected $table = 'meses_periodo';
    protected $primaryKey = 'id_meses_periodo';
    public $timestamps = false;
    protected $fillable = [
        'id_anio',
        'id_periodo_anual',
        'id_meses'
    ];

    public function get_anio()
    { return $this->hasOne('App\Models\anio','id_anio', 'id_anio'); }

    public function get_periodo_anual()
    { return $this->hasOne('App\Models\periodo_anual','id_periodo_anual', 'id_periodo_anual'); } 

    public function get_meses()
    { return $this->hasOne('App\Models\meses','id_meses', 'id_meses'); } 

}
