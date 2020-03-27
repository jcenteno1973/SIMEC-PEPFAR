<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class re_vinculacion extends Model
{
    protected $table = 're_vinculacion';
    protected $primaryKey = 'id_re_vinculacion';
    public $timestamps = false;
    protected $fillable = [
        'id_index_testing',
        'id_estado_index',
        'fecha_re_vinculacion'
    ];
    
    public function get_index_testing()
    {
        return $this->hasOne('App\Models\index_testing','id_index_testing', 'id_index_testing');
    }
    
    public function get_estado_index()
    {
        return $this->hasOne('App\Models\estado_index','id_estado_index', 'id_estado_index');
    }

}
