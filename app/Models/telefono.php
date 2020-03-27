<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class telefono extends Model
{
    protected $table = 'telefono';
    protected $primaryKey = 'id_telefono';
    public $timestamps = false;
    protected $fillable = [
        'id_index_testing',
        'id_tipo',
        'numero_telefono',
        'enviar_sms',
        'principal'
    ];
    
    public function getifenviarsmsAttribute()
    {
        if ( $this->enviar_sms == 1)
        {
            return "SI";
        }
        else
        {
            return "NO";
        }
        return "NO";
    }
    
    public function getifprincipalAttribute()
    {
        if ( $this->principal == 1)
        {
            return "SI";
        }
        else
        {
            return "NO";
        }
        return "NO";
    }
    
    public function get_index_testing()
    {
        return $this->hasOne('App\Models\index_testing','id_index_testing', 'id_index_testing');
    }
    
    public function get_tipo()
    {
        return $this->hasOne('App\Models\tipo','id_tipo', 'id_tipo');
    }

}
