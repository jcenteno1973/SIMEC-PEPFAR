<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    protected $table = 'agenda';
    protected $primaryKey = 'id_agenda';
    public $timestamps = false;
    protected $fillable = [
        'id_index_testing',
        'id_tipo_mensaje',
        'fecha_agenda',
        'observacion',
        'cancelada',
        'realizada'
    ];
    
    public function get_index_testing()
    {
        return $this->hasOne('App\Models\index_testing','id_index_testing', 'id_index_testing');
    }
    
    public function get_tipo_mensaje()
    {
        return $this->hasOne('App\Models\tipo_mensaje','id_tipo_mensaje', 'id_tipo_mensaje');
    }
    
    public function getifcanceladaAttribute()
    {
        if ( $this->cancelada == 1)
        {
            return "SI";
        }
        else
        {
            return "NO";
        }
        return "NO";
    }
    
    public function getifrealizadaAttribute()
    {
        if ( $this->realizada == 1)
        {
            return "SI";
        }
        else
        {
            return "NO";
        }
        return "NO";
    }
    
}
