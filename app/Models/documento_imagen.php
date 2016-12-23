<?php
/*
 * Nombre del archivo: documento_imagen.php
 * Descripción: modelo para la tabla documento_imagen
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class documento_imagen extends Model
{
    //
    protected $table = 'documento_imagen';
    protected $primaryKey = 'id_documento_imagen';
    public $timestamps = false;
    protected $fillable = [
        'nombre_archivo',
        'url_doc_img',
        'id_usuario_crea',
        'id_usuario_modifica',
        'fecha_hora_creacion',
        'fecha_hora_modificacion',
        'ip_dispositivo'
        ];    
}
