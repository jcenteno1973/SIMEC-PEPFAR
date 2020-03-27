<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class meses extends Model
{
    protected $table = 'meses';
    protected $primaryKey = 'id_meses';
    public $timestamps = false;
    protected $fillable = [
        'nombre_mes'
    ];

}
