<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class periodo_anual extends Model
{
    protected $table = 'periodo_anual';
    protected $primaryKey = 'id_periodo_anual';
    public $timestamps = false;
    protected $fillable = [
        'desc_periodo_anual',
        'vigente'
    ];

}
