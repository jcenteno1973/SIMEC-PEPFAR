<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cascada extends Model
{
    protected $table = 'cascada';
    protected $primaryKey = 'id_cascada';
    public $timestamps = false;
    protected $fillable = [
        'descripcion_cascada'
    ];

}
