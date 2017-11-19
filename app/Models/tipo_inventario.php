<?php
/*
 * Nombre del archivo: tipo_inventario.php
 * Descripción: modelo para la tabla tipo_inventario
 * Fecha de creación:22/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_inventario extends Model
{
    //
    protected $table = 'tipo_inventario';
    protected $primaryKey = 'id_tipo_inventario';
    public $timestamps = false;
    protected $fillable = [
        'nombre_tipo_inventario'
    ];
}
