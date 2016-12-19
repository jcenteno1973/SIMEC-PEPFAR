<?php
/*
 * Nombre del archivo: bitacora.php
 * Descripción:
 * Fecha de creación:23/11/2016
 * Creado por: TG-14
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bitacora extends Model
{
    //
    protected $table = 'bitacora';
    protected $primaryKey = 'id_bitacora';
    public $timestamps = false;
    protected $fillable = [
        'id_usuario_app',
        'fecha_hora_transaccion',
        'transaccion_realizada'
    ];
    
   /*relacion con usuario
    public function fnc_usuarios_app()
    {
        return $this->hasMany('App\User');
    }
    * 
    */
}
