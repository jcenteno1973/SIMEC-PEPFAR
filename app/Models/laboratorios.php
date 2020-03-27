<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class laboratorios extends Model
{
    protected $table = 'laboratorios';
    protected $primaryKey = 'id_laboratorios';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',
        'nombre_laboratorio'
    ];
    
    public function get_municipio()
    { return $this->hasOne('App\Models\municipio','id_municipio', 'id_municipio'); }


}
