<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cant_servicios extends Model
{
    protected $table = 'cant_servicios';
    protected $primaryKey = 'id_cant_servicios';
    public $timestamps = false;
    protected $fillable = [
        'desc_cant_servicios',
        'diferenciador'
    ];

}
