<?php
/*
 * Nombre del archivo: depreciacion.php
 * Descripción: modelo para la tabla depreciacion
 * Fecha de creación:22/12/16
 * Creado por: Yamileth Campos
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class descripcion extends Model
{
    //
    protected $table = 'depreciacion';
    protected $primaryKey = 'id_depreciacion';
    public $timestamps = false;
    protected $fillable = [
        'valor_depreciar',
        'cuota_mensual',
        'cuota_anual',
        'valor_libros',
        'depreciacion_acumulada',
        'estado_depreciacion',
        'estado_registro',
        'id_usuario_crea',
        'id_usuario_modifica',
        'ip_dispositivo'
        ];
}
