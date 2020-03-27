<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prueba extends Model
{
    protected $table = 'prueba';
    protected $primaryKey = 'id_prueba';
    public $timestamps = false;
    protected $fillable = [
        'descripcion_prueba'
    ];

}
