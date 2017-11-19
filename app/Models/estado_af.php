<?php
/*
 * Nombre del archivo: estado_af.php
 * Descripción: modelo para la tabla estado_af
 * Fecha de creación:22/12/16
 * Creado por: Yamileth Campos
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estado_af extends Model
{
    //
     protected $table = 'estado_af';
    protected $primaryKey = 'id_estado';
    public $timestamps = false;
    protected $fillable = [
        'nombre_estado'
    ];
}
