<?php
/*
 * Nombre del archivo: lista_color.php
 * Descripción: modelo para la tabla lista_color
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lista_color extends Model
{
    //
    protected $table = 'lista_color';
    protected $primaryKey = 'id_lista_color';
    public $timestamps = false;
    protected $fillable = [
        'desc_color',
        'estado_registro'
    ];

//relacion     
/*    public function fnc_usuario_app()
    {
        return $this->hasMany('App\Models\usuario_app');
    }
 
 */

//validacion
    public function scope_nombre($query, $nombre)
    {
	if(trim($nombre)!="")
        {
            $query->where('desc_color',"LIKE","%$nombre%");
        }
            

    }
}
