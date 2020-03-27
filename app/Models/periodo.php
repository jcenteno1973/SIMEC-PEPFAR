<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class periodo extends Model
{
    protected $table = 'periodo';
    protected $primaryKey = 'id_periodo';
    public $timestamps = false;
    protected $fillable = [
        'id_periodo',
        'descripcion_periodo',
        'vigente',
        'diferenciador'
    ];

}
