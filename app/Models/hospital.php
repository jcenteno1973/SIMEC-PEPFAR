<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hospital extends Model
{
    protected $table = 'hospital';
    protected $primaryKey = 'id_hospital';
    public $timestamps = false;
    protected $fillable = [
        'id_hospital',
        'id_municipio',
        'nombre_hospital'
    ];
    
    
    public function municipio()
    {
        return $this->hasOne('App\Models\municipio','id_municipio', 'id_municipio');
    }
    
    public function get_municipio()
    { return $this->hasOne('App\Models\municipio','id_municipio', 'id_municipio'); }

}
