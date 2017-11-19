<?php
/*
 * Nombre del archivo: movimiento.php
 * Descripción: modelo para la tabla movimiento
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class movimiento extends Model
{
    //
    protected $table = 'movimiento';
    protected $primaryKey = 'id_solicitar_traslado,id_ficha_activo_fijo';
    public $timestamps = false;
    protected $fillable = [
        'fecha_hora_creacion',
        'fecha_hora_modificacion'
    ];
}
