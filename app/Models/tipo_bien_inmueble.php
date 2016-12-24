<?php
/*
 * Nombre del archivo: tipo_bien_inmueble.php
 * Descripción: modelo para la tabla 
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_bien_inmueble extends Model
{
    //
     protected $table = 'tipo_bien_inmueble';
    protected $primaryKey = 'id_tipo_bien_inmueble';
    public $timestamps = false;
    protected $fillable = [
        'codigo_tipo_bien_inmueble',
        'nombre_tipo_bien_inmueble'
    ];    
}
