<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class semana extends Model
{
    protected $table = 'semana';
    protected $primaryKey = 'id_semana';
    public $timestamps = false;
    protected $fillable = [
        'descripcion'
    ];

}
