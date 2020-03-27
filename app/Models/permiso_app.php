<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permiso_app extends Model
{
    protected $table = 'permiso_app';
    protected $primaryKey = 'id_permiso_app';
    public $timestamps = false;
    protected $fillable = [
        'id_permiso_app',
        'name',
        'nombre_mostrar'
    ];

}
