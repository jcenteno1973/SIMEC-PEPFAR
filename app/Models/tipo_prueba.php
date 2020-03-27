<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_prueba extends Model
{
    protected $table = 'tipo_prueba';
    protected $primaryKey = 'id_tipo_prueba';
    public $timestamps = false;
    protected $fillable = [
        'desc_tipo_prueba'
    ];
    
}
