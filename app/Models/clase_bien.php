<?php
/*
 * Nombre del archivo: clase_bien.php
 * Descripción: modelo para la tabla clase_bien
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clase_bien extends Model
{
    //
    protected $table = 'clase_bien';
    protected $primaryKey = 'id_clase_bien';
    public $timestamps = false;
    protected $fillable = [
        'codigo_clase_bien',
        'nombre_clase_bien'
    ];     
}
