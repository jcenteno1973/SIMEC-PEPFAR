<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cascada_cv extends Model
{
    protected $table = 'cascada_cv';
    protected $primaryKey = 'id_cascada_cv';
    public $timestamps = false;
    protected $fillable = [
        'desc_cascada_cv'
    ];

}
