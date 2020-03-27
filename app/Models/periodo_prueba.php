<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class periodo_prueba extends Model
{
    protected $table = 'periodo_prueba';
    protected $primaryKey = 'id_periodo_prueba';
    public $timestamps = false;
    protected $fillable = [
        'descripcion_periodo_prueba'
    ];

}
