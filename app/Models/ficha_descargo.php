<?php
/*
 * Nombre del archivo: ficha_descargo.php
 * Descripción: modelo para la tabla ficha_descargo
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ficha_descargo extends Model
{
    //
    protected $table = 'ficha_descargo';
    protected $primaryKey = 'id_descargo';
    public $timestamps = false;
    protected $fillable = [
        'fecha_descargo',
        'descripcion',
        'numero_acta',
        'destino_cumplido',
        'fecha_cumplimiento',
        'estad_registro',        
        'id_usuario_crea',
        'id_usuario_modifica',
        'ip_dispositivo'
        ];
    
}
