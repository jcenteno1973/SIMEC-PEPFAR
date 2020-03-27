<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prueba_diagnostica_tb extends Model
{
    protected $table = 'prueba_diagnostica_tb';
    protected $primaryKey = 'id_prueba_diagnostica_tb';
    public $timestamps = false;
    protected $fillable = [
        'desc_prueba_diagnostica_tb',
        'diferenciador'
    ];

}
