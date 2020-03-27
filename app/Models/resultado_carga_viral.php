<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class resultado_carga_viral extends Model
{
    protected $table = 'resultado_carga_viral';
    protected $primaryKey = 'id_resultado_carga_viral';
    public $timestamps = false;
    protected $fillable = [
        'descripcion_resultado_carga_viral'
    ];

}
