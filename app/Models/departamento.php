<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    protected $table = 'departamento';
    protected $primaryKey = 'id_departamento';
    public $timestamps = false;
    protected $fillable = [
        'id_region_sica',
        'codigo_departamento',
        'nombre_departamento'
    ];
    
    public function get_region_sica()
    {
        return $this->belongsTo('App\Models\region_sica','id_region_sica', 'id_region_sica');
    }

}
