<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class motivo_rechazo_index extends Model
{
    protected $table = 'motivo_rechazo_index';
    protected $primaryKey = 'id_motivo_rechazo_index';
    public $timestamps = false;
    protected $fillable = [
        'motivo_rechazo_index'
    ];

}
