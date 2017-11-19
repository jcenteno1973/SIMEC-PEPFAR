<?php
/*
 * Nombre del archivo: ubicacion_bien.php
 * Descripción: modelo para la tabla ubicacion_bien
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ubicacion_bien extends Model
{
    //
    protected $table = 'ubicacion_bien';
    protected $primaryKey = 'id_ubicacion_bien';
    public $timestamps = false;
    protected $fillable = [
        'codigo_ubicacion_bien',
        'nombre_ubicacion_bien'
    ];        
}
