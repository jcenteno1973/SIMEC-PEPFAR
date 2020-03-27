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
        'transaccion_realizada',
        'ip_dispositivo'      
    ];
    
    protected $dates = ['fechat', 'fecha_hora_transaccion'];

    public function usuario()
    {
        return $this->hasOne('App\User','id_usuario_app', 'id_usuario_app');
    }
    
    public function getFechatAttribute()
    {
        return $this->fecha_hora_transaccion->format('Y-m-d');
    }
}

