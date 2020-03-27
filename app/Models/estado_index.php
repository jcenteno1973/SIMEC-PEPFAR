<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estado_index extends Model
{
    protected $table = 'estado_index';
    protected $primaryKey = 'id_estado_index';
    public $timestamps = false;
    protected $fillable = [
        'desc_estado_index'
    ];
    
}
