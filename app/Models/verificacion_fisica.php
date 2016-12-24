<?php
/*
 * Nombre del archivo: verificacion_fisica.php
 * Descripción: modelo para la tabla verificacion_fisica
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class verificacion_fisica extends Model
{
    //
    protected $table = 'verificacion_fisica';
    protected $primaryKey = 'id_verificacion_fisica';
    public $timestamps = false;
    protected $fillable = [
        'fecha_verificacion_fisica',
        'nombre_responsable',
        'nombre_verificador',
        'estado_registro',
        'id_usuario_crea',
        'id_usuario_modifica',
        'ip_dispositivo'
    ];
}
