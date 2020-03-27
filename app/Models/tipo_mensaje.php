<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_mensaje extends Model
{
    protected $table = 'tipo_mensaje';
    protected $primaryKey = 'id_tipo_mensaje';
    public $timestamps = false;
    protected $fillable = [
        'descripcion_tipo_mensaje',
        'agenda'
    ];

}
