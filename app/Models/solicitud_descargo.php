<?php
/*
 * Nombre del archivo: solicitud_descargo.php
 * Descripción: modelo para la tabla solicitud_descargo
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class solicitud_descargo extends Model
{
    //
    protected $table = 'solicitud_descargo';
    protected $primaryKey = 'id_solicitud_descargo';
    public $timestamps = false;
    protected $fillable = [
        'fecha_solicitud_descargo',
        'nombre_solicitante',
        'nombre_unidad_dep',
        'motivo_descargo',
        'observacion',
        'estado_solicitud',
        'estado_registro',
        'id_usuario_crea',
        'id_usuario_modifica',
        'ip_dispositivo'
        ];

}
