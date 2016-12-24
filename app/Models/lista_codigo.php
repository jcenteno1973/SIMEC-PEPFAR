<?php
/*
 * Nombre del archivo: lista_codigo.php
 * Descripción: modelo para la tabla lista_codigo
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lista_codigo extends Model
{
    //
    protected $table = 'lista_codigo';
    protected $primaryKey = 'id_codigo_inventario';
    public $timestamps = false;
    protected $fillable = [
        'correlativo',
        'codigo_inventario',
        'estado_codigo',
        'estado_registro',
        'fecha_hora_creacion',
        'feha_hora_modificacion'
    ];
}
