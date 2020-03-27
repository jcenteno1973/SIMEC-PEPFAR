<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    protected $table = 'tipo';
    protected $primaryKey = 'id_tipo';
    public $timestamps = false;
    protected $fillable = [
        'descripcion_tipo'
    ];

}
