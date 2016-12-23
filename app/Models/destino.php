<?php
/*
 * Nombre del archivo: destino.php
 * Descripción: modelo para la tabla destino
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class destino extends Model
{
    //
    protected $table = 'destino';
    protected $primaryKey = 'id_destino';
    public $timestamps = false;
    protected $fillable = [
        'nombre_destino'
        ];

}
