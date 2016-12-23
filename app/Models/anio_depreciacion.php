<?php
/*
 * Nombre del archivo: anio_depreciacion.php
 * Descripción: modelo para la tabla anio_depreciacion
 * Fecha de creación:22/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class anio_depreciacion extends Model
{
    //
    protected $table = 'anio_depreciacion';
    protected $primaryKey = 'id_anio';
    public $timestamps = false;
    protected $fillable = [
        'digitos_anio'
    ];
}
