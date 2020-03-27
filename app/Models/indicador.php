<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class indicador extends Model
{
    protected $table = 'indicador';
    protected $primaryKey = 'id_indicador';
    public $timestamps = false;
    protected $fillable = [
        'ind_id_indicador',
        'indicador',
        'descripcion_indicador',
        'tipo_indicador'
    ];

    public function get_indicadorPadre()
    { return $this->hasOne('App\Models\indicador','id_indicador', 'ind_id_indicador'); }
    
}
