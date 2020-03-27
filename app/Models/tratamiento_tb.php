<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tratamiento_tb extends Model
{
    protected $table = 'tratamiento_tb';
    protected $primaryKey = 'id_tratamiento_tb';
    public $timestamps = false;
    protected $fillable = [
        'desc_tratamiento_tb'
    ];

}
