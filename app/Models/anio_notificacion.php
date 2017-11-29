<?php
/*
 * Nombre del archivo: anio_notificacion.php
 * Descripción: modelo para la tabla anio_notificación
 * Fecha de creación:18/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class anio_notificacion extends Model
{
    protected $table = 'anio_notificacion';
    protected $primaryKey = 'id_anio_notificacion';
    public $timestamps = false;
    protected $fillable = [
        'digitos_anio'
    ];
    //
}
