<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_referencia extends Model
{
    protected $table = 'tipo_referencia';
    protected $primaryKey = 'id_tipo_referencia';
    public $timestamps = false;
    protected $fillable = [
        'tipo_referencia'
    ];

}
