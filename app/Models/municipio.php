<?php
/*
 * Nombre del archivo: municipio.php
 * Descripción: modelo para la tabla municipio
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    protected $table = 'municipio';
    protected $primaryKey = 'id_municipio';
    public $timestamps = false;
    protected $fillable = [
        'id_departamento',
        'codigo_municipio',
        'nombre_municipio',
        'kpif'
    ];

    public function get_departamento()
    {
        return $this->hasOne('App\Models\departamento','id_departamento', 'id_departamento');
    }
}