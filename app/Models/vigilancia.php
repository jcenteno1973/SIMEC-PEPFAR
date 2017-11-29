<?php
/*
 * Nombre del archivo: vigilancia.php
 * Descripción: modelo para la tabla vigilancia_epidemiologica
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vigilancia extends Model
{
    protected $table = 'vigilancia_epidemiologica';
    protected $primaryKey = 'id_vigilancia_epidemiologica';
    public $timestamps = false;
    protected $fillable = [
        'valor_vigilancia_epi',
        'valor_indicador'
        
    ];
    //
}
