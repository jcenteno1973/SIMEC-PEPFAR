<?php
/*
 * Nombre del archivo: tipo_movimiento.php
 * Descripción: modelo para la tabla tipo_movimiento
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_movimiento extends Model
{
    //
    protected $table = 'tipo_movimiento';
    protected $primaryKey = 'id_tipo_moviento';
    public $timestamps = false;
    protected $fillable = [
        'nombre_tipo_movimiento',
    ];
}
