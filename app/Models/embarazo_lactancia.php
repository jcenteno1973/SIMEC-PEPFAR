<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class embarazo_lactancia extends Model
{
    protected $table = 'embarazo_lactancia';
    protected $primaryKey = 'id_embarazo_lactancia';
    public $timestamps = false;
    protected $fillable = [
        'desc_embarazo_lactancia'
    ];

}
