<?php
/*
 * Nombre del archivo: tipo_bien_mueble.php
 * Descripción: modelo para la tabla tipo_bien_mueble
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_bien_mueble extends Model
{
    //
    protected $table = 'tipo_bien_mueble';
    protected $primaryKey = 'id_tipo_bien_mueble';
    public $timestamps = false;
    protected $fillable = [
        'codigo_tipo_bien_mueble',
        'nombre_tipo_bien_mueble'
    ];     
}
