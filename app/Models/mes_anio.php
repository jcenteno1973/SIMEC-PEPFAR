<?php
/*
 * Nombre del archivo: mes_anio.php
 * Descripción: modelo para la tabla mes_anio
 * Fecha de creación:22/12/16
 * Creado por: Yamileth Campos
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mes_anio extends Model
{
    //
protected $table = 'mes_anio';
    protected $primaryKey = 'id_mes';
    public $timestamps = false;
    protected $fillable = [
        'nombre_mes'
    ];
            
}
