<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_beneficio extends Model
{
    protected $table = 'tipo_beneficio';
    protected $primaryKey = 'id_tipo_beneficio';
    public $timestamps = false;
    protected $fillable = [
        'desc_tipo_beneficio'
    ];

}
