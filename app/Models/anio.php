<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class anio extends Model
{
    protected $table = 'anio';
    protected $primaryKey = 'id_anio';
    public $timestamps = false;
    protected $fillable = [
        'descripcion_anio'
    ];

}
