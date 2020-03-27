<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 * 
 * NO SE ESTA OCUPANDO, retirar comentario cuando tenga utilidad
 * 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permission_role extends Model
{
    protected $table = 'permission_rol';
    protected $primaryKey = ['permission_id','role_id'];
    public $timestamps = false;
    protected $fillable = [
        'permission_id',
        'role_id'
    ];

}
