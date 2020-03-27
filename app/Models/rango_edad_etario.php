<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rango_edad_etario extends Model
{
    protected $table = 'rango_edad_etario';
    protected $primaryKey = 'id_rango_edad_etario';
    public $timestamps = false;
    protected $fillable = [
        'rango_edad_etario',
        'desde',
        'hasta'
    ];

}
