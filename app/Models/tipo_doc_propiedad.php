<?php
/*
 * Nombre del archivo: tipo_doc_propiedad.php
 * Descripción: modelo para la tabla tipo_doc_propiedad
 * Fecha de creación:22/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_doc_propiedad extends Model
{
    //
    protected $table = 'tipo_doc_propiedad';
    protected $primaryKey = 'id_tipo_doc_propiedad';
    public $timestamps = false;
    protected $fillable = [
        'nombre_tipo_documento'
    ];
}
