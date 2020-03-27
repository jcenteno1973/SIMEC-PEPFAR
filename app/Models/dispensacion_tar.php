<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dispensacion_tar extends Model
{
    protected $table = 'dispensacion_tar';
    protected $primaryKey = 'id_dispensacion_tar';
    public $timestamps = false;
    protected $fillable = [
        'dispensacion_tar'
    ];

}
