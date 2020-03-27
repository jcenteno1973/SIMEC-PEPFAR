<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sexo extends Model
{
    protected $table = 'sexo';
    protected $primaryKey = 'id_sexo';
    public $timestamps = false;
    protected $fillable = [
        'descripcion_sexo'
    ];

}
