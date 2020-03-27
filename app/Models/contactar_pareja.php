<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contactar_pareja extends Model
{
    protected $table = 'contactar_pareja';
    protected $primaryKey = 'id_contactar_pareja';
    public $timestamps = false;
    protected $fillable = [
        'id_index_testing',
        'id_tipo_referencia',
        'contacto_exito',
        'fecha_contacto',
        'observacion',
        'acepta',
        'fecha_limite',
        'id_motivo_rechazo_index'
    ];

    
    protected $dates = ['feccontacto', 'fecha_contacto', 'fecha_limite'];

    public function getFeccontactoAttribute()
    {
        if ($this->fecha_contacto == null)
        { return ""; }
        else
        { return $this->fecha_contacto->format('d/m/Y'); }
    }
    
    public function getifcontactoexitoAttribute()
    {
        if ( $this->contacto_exito == 1)
        { return "SI"; }
        else
        { return "NO"; }
        
        return "NO";
    }
    
    public function get_tipo_referencia()
    {
        return $this->hasOne('App\Models\tipo_referencia','id_tipo_referencia', 'id_tipo_referencia');
    }
    
}
