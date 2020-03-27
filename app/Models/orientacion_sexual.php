<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orientacion_sexual extends Model
{
    protected $table = 'orientacion_sexual';
    protected $primaryKey = 'id_orientacion_sexual';
    public $timestamps = false;
    protected $fillable = [
        'desc_orientacion_sexual'
    ];
    
}
