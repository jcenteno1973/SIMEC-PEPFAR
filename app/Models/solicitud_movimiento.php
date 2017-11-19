<?php
/*
 * Nombre del archivo: solicitud_movimiento.php
 * Descripción: modelo para la tabla solicitud movimiento
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class solicitud_movimiento extends Model
{
    //
    protected $table = 'solicitud_movimiento';
    protected $primaryKey = 'id_solicitud_traslado';
    public $timestamps = false;
    protected $fillable = [
        'unidad_proveniencia',
        'nueva_unidad',
        'nuevo_responsable',
        'motivo_movimiento',
        'fecha_movimiento',
        'nombre_autoriza',
        'nombre_entrega',
        'nombre_recibe',
        'nombre_verifica',
        'estado_solicitud',
        'estado_registro',
        'id_usuario_crea',
        'id_usuario_modifica',
        'ip_dispositivo'
        ];
}
