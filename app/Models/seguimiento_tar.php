<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class seguimiento_tar extends Model
{
    protected $table = 'seguimiento_tar';
    protected $primaryKey = 'id_seguimiento_tar';
    public $timestamps = false;
    protected $fillable = [
        'id_seguimiento_tar',
        'desc_seguimiento_tar'
    ];

}
